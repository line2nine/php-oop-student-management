<?php

class StudentManager
{
    protected $filePath;
    protected $listStudent = [];

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function getListStudent()
    {
        $arrData = $this->getJSON();
        foreach ($arrData as $obj) {
            $student = new Student($obj->name, $obj->email, $obj->phone,
                $obj->image, $obj->group);
            array_push($this->listStudent, $student);
        }
        return $this->listStudent;
    }

    public function addStudent(Student $student)
    {
        $arrData = $this->getJSON();
        $data = [
            "name" => $student->getName(),
            "email" => $student->getEmail(),
            "phone" => $student->getPhone(),
            "image" => $student->getImage(),
            "group" => $student->getGroup(),
        ];
        array_push($arrData, $data);
        $this->saveJSON($arrData);
    }

    public function editStudent($index, $data)
    {
        $arrData = $this->getJSON();
        // Cách edit khác:
//        $data = [
//            "name" => $student->getName(),
//            "email" => $student->getEmail(),
//            "phone" => $student->getPhone(),
//            "image" => $student->getImage()
//        ];
        $arrData[$index] = $data;
        $this->saveJSON($arrData);
    }

    public function deleteStudent($index, $fileName)
    {
        unlink("../upload/" . $fileName);
        $arrData = $this->getJSON();
        //unlink("../upload/" . $arrData[$index]->image); Cách 2: xóa file tại vị trí index trong json
        array_splice($arrData, $index, 1, null);
        $this->saveJSON($arrData);
    }

    public function searchStudent($keyword)
    {
        $arrData = $this->getJSON();
        $arr = [];
        foreach ($arrData as $item) {
            if (strpos(strtolower($item->name), strtolower($keyword)) !== false
                || strpos(strtolower($item->email), strtolower($keyword))
                !== false
                || strpos(strtolower($item->phone), strtolower($keyword))
                !== false
            ) {
                array_push($arr, $item);
            }
        }
        return $arr;
    }

    public function getStudentByIndex($index)
    {
        $arrData = $this->getJSON();
        $student = new Student($arrData[$index]->name, $arrData[$index]->email,
            $arrData[$index]->phone, $arrData[$index]->image,
            $arrData[$index]->group);
        array_push($this->listStudent, $student);
        return $this->listStudent;
    }

    public function getJSON()
    {
        $dataJSON = file_get_contents($this->filePath);
        return json_decode($dataJSON);
    }

    public function saveJSON($data)
    {
        $dataJSON = json_encode($data);
        file_put_contents($this->filePath, $dataJSON);
    }
}