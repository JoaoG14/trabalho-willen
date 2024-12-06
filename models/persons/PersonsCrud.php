<?php

class PersonsCrud
{

    private $pdoCrud;
    private $table = "pessoas";


    public function __construct()
    {
        $this->pdoCrud = new PDOCrud;
    }

    public function submitform($id = null, $name, $email, $phone, $document, $gender, $description, $password = null, $photo)
    {

        if ($id) {

            $pdo = array(
                ':name'         => $name,
                ':email'        => $email,
                ':phone'        => $phone,
                ':document'     => $document,
                ':gender'       => $gender,
                ':description'  => $description,
            );

            $columns = "nome=:name, email=:email, telefone=:phone, cpf=:document, sexo=:gender, descricao=:description";

            if ($password) {

                $salt = sha1(rand());

                $pdo = array_merge($pdo, array(
                    ':password' => hash("sha512", $password) . $salt,
                    ':salt'         => $salt,
                ));

                $columns = $columns . ", senha=:password, salt=:salt";
            }

            if ($this->pdoCrud->update($this->table, $columns, 'WHERE id = :id', array_merge($pdo, array(
                ':id' => $id
            )))) {
                if ($photo['name'] != '') {
                    $this->photoControl($id, $photo);
                }
                return $id;
            }
        } else {
            $salt         = sha1(rand());

            $pdo = array(
                ':name'         => $name,
                ':email'        => $email,
                ':phone'        => $phone,
                ':document'     => $document,
                ':gender'       => $gender,
                ':description'  => $description,
                ':password'     => hash("sha512", $password) . $salt,
                ':salt'         => $salt,
            );

            $columns = 'nome, email, telefone, cpf, sexo, descricao, senha, salt';
            $values  = ':name, :email, :phone, :document, :gender, :description, :password, :salt';

            $id = $this->pdoCrud->insert($this->table, $columns, $values, $pdo);

            if($id){
                if ($photo['name'] != '') {
                    $this->photoControl($id, $photo);
                }
                return $id;
            }

            return false;
        }
    }

    public function removePerson($id)
    {

        return $this->pdoCrud->delete($this->table, $id);
    }

    public function photoControl($id, $photo)
    {

        $imageName = $photo['name'];
        $imageType = $photo['type'];
        $imageTmp = $photo['tmp_name'];

        if ($imageTmp != "") {

            $image = $this->ImageConfiguration($imageName, $imageType, $imageTmp, 600, 400, $id);

            return $this->savePhoto($image, $id);
        }

        return false;
    }

    public function ImageConfiguration($name, $type, $temp, $width, $height, $id)
    {
        if (preg_match("/^image\/(png)$/", $type)) {
            $formatedImage = imagecreatefrompng($temp);
        } else {
            $formatedImage = imagecreatefromjpeg($temp);
        }

        $originalWidth = imagesx($formatedImage);

        $originalHeigth = imagesy($formatedImage);

        if ($originalWidth > $width) {

            $newWidth  = $width;
        } else {

            $newWidth = $originalWidth;
        }

        $newHeigth = ($originalHeigth * $newWidth) / $originalWidth;

        if ($originalHeigth > $height) {

            $newHeigth  = $height;
        } else {

            $newHeigth = $originalHeigth;
        }

        $newWidth = ($originalWidth * $newHeigth) / $originalHeigth;

        $newImage = imagecreatetruecolor($newWidth, $newHeigth);

        // preserve transparency
        $transindex = imagecolortransparent($formatedImage);

        if ($transindex >= 0) {

            $transcol = imagecolorsforindex($formatedImage, $transindex);
            $transindex = imagecolorallocatealpha($newImage, $transcol['red'], $transcol['green'], $transcol['blue'], 127);
            imagefill($newImage, 0, 0, $transindex);
            imagecolortransparent($newImage, $transindex);
        } else if (preg_match("/^image\/(png)$/", $type)) {

            imagesavealpha($newImage, true);
            $color = imagecolorallocatealpha($newImage, 0, 0, 0, 127);
            imagefill($newImage, 0, 0, $color);
        }

        imagecopyresampled($newImage, $formatedImage, 0, 0, 0, 0, $newWidth, $newHeigth, $originalWidth, $originalHeigth);

        return $this->savePhotoFile($newImage, $formatedImage, $type, $id);
    }

    private function savePhotoFile($newImage, $temp, $type, $id)
    {

        $newName = sha1($id);

        if (preg_match("/^image\/(png)$/", $type)) {

            $newName .= '.png';
        } else {

            $newName .= '.jpg';
        }

        if (!file_exists(ROOT . "/assets/img/users/")) {

            mkdir(ROOT . "/assets/img/users/", 0755, true);
        }

        if (!file_exists(ROOT . "/assets/img/users/" . $id)) {

            mkdir(ROOT . "/assets/img/users/" . $id, 0755, true);
        }

        if (preg_match("/^image\/(png)$/", $type)) {

            imagepng($newImage, ROOT . "/assets/img/users/" . $id . "/" . $newName, 8);

        }else{

            imagejpeg($newImage, ROOT . "/assets/img/users/" . $id . "/" . $newName, 85);

        }

        imagedestroy($temp);

        imagedestroy($newImage);

        return $newName;
    }

    private function savePhoto($photo, $id)
    {

        $pdo = array(
            ':id'           => $id,
            ':photo'        => $photo,
        );

        $columns  = 'photo=:photo';

        return $this->pdoCrud->update($this->table, $columns, 'WHERE id = :id', $pdo);
    }
}
