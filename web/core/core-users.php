<?php
    function loaddata($path) {
        $f = fopen($path,'r');
        $array = [];
        while(!feof($f)) {
            $f_str = fgets($f);
            if ($f_str) {
                $f_ar = explode('|',$f_str);
                if (count($f_ar) == 5) {
                    $array[$f_ar[0]] = [
                        'name_access' => $f_ar[1],
                        'full_name' => $f_ar[2],
                        'email' => $f_ar[3],
                        'image' => $f_ar[4]
                    ];
                }
            }
        }
        fclose($f);
        return $array;
    }

    $array = loaddata('data/users-data.txt');

    

    class xulyfile {
        var $array,$id,$name_access,$full_name,$email,$image;
        function __construct($array,$id,$name_access,$full_name,$email,$image) {
            $this->array = $array;
            $this->id = $id;
            $this->name_access = $name_access;
            $this->full_name = $full_name;
            $this->email = $email;
            $this->image = $image;
        }

        function add() {
            if (isset($this->array[$this->id])) {
                echo 'sản phẩm đã tồn tại';
            } else {
                $this->array[$this->id] = array('name_access' => $this->name_access, 'full_name' => $this->full_name, 'email' => $this->email , 'image' => $this->image);
                return $this->array;
                echo 123;
            }
        }

        function remove() {
            if (isset($this->array[$this->id])) {
                unlink(trim($this->array[$this->id]['image']));
                unset($this->array[$this->id]);
                return $this->array;
            } else {    
                echo 'sản phẩm không tồn tại';
            }
        }

        function repair() {
            if (isset($this->array[$this->id])) {
                $this->array[$this->id] = array('name_access' => $this->name_access, 'full_name' => $this->full_name, 'email' => $this->email , 'image' => $this->image);
                return $this->array;
            } else {
                echo 'sản phẩm không tồn tại';
            }
        }
    }

    function update_data($path,$array) {
        $f = fopen($path,'w');
        $content = '';
        foreach ($array as $id => $users) {
            $name_access = $users['name_access'];
            $image = trim($users['image']);
            $full_name = $users['full_name'];
            $email = $users['email'];
            $content .= "$id|$name_access|$full_name|$email|$image\n";
        }
        fwrite($f,$content);
        fclose($f);
        return loaddata($path);
    }
    
    // function add(&$array,$id,$name_access,$full_name,$email,$image) {
    //     if (isset($array[$id])) {
    //         echo 'sản phẩm đã tồn tại';
    //     } else {
    //         $array[$id] = array('name_access' => $name_access, 'full_name' => $full_name, 'email' => $email , 'image' => $image);
    //     }
    // }

    // function remove(&$array,$id) {
    //     if (isset($array[$id])) {
    //         unlink(trim($array[$id]['image']));
    //         unset($array[$id]);
    //     } else {    
    //         echo 'sản phẩm không tồn tại';
    //     }
    // }

    // function repair(&$array,$id,$name_access,$full_name,$email,$image) {
    //     if (isset($array[$id])) {
    //         $array[$id] = array('name_access' => $name_access, 'full_name' => $full_name, 'email' => $email , 'image' => $image);
    //     } else {
    //         echo 'sản phẩm không tồn tại';
    //     }
    // }

    function upload($file,$folder,$types = ['.jpg','.png','.gif'],$size = 2,&$msg = '') {
        if (isset($file['error']) && $file['error'] == 0) {
            $ext = substr($file['name'],strrpos($file['name'],'.'));
            if (in_array($ext,$types)) {
                $maxsize = $size * 1024 * 1024; //byte
                if ($file['size'] > 0 && $file['size'] < $maxsize) {
                    $path = $folder . '/file_' . time() . $ext;
                    move_uploaded_file($file['tmp_name'],$path);
                    return $path;
                } else {
                    $msg = 'Chỉ cho phép kích cỡ ' . $size . 'mb';
                    return false;
                }
            } else {
                $msg = 'Chỉ cho phép ' . implode(',',$types);
                return false;
            }
        } else {
            $msg = 'file chưa được upload'; 
            return false;
        }
    }
    
    
?>