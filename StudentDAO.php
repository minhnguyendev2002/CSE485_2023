<?php
    class StudentDAO {
        private $students;
        private $filename;
        public function __construct($filename) {
            $this->students = array();
            $this->filename = $filename;
            $this->load();
        }
        public function add($student) {
            foreach ($this->students as $s) {
                if ($s->getId() == $student->getId()) {
                    return false;
                }
            }
            $this->students[] = $student;
            $this->save();
            return true;
        }
        public function update($student) {
            foreach ($this->students as &$s) {
                if ($s->getId() == $student->getId()) {
                    $s->setName($student->getName());
                    $s->setAge($student->getAge());
                    $this->save();
                    return true;
                }
            }
            return false;
        }
        public function delete($id) {
            foreach ($this->students as $key => $s) {
                if ($s->getId() == $id) {
                    unset($this->students[$key]);
                    $this->save();
                    return true;
                }
            }
            return false;
        }
        public function getById($id) {
            foreach ($this->students as $s) {
                if ($s->getId() == $id) {
                    return $s;
                }
            }
            return null;
        }
        public function getAll() {
            return $this->students;
        }
        private function load() {
            if (file_exists($this->filename)) {
                $handle = fopen($this->filename, "r");
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $student = new Student($data[0], $data[1], $data[2]);
                    $this->students[] = $student;
                }
                fclose($handle);
            }
        }
        private function save() {
            $handle = fopen($this->filename, "w");
            foreach ($this->students as $s) {
                fputcsv($handle, array($s->getId(), $s->getName(), $s->getAge()));
            }
            fclose($handle);
        }
    }
