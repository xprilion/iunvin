<?php

class resizeimage
{
    var $type;
    var $width;
    var $height;
    var $resize_width;
    var $resize_height;
    var $cut;
    var $srcimg;
    var $dstimg;
    var $im;

	var $fill;

    function resizeimage($img, $image_type, $target, $wid, $hei,$c = 5, $qu = 75, $fill = '')
    {
$uname=$_COOKIE['iunv_uname'];

        $this->srcimg = 'uploads/images/'.$uname.'/'.$img;
	$this->fill = $fill;
        $this->resize_width = $wid;
        $this->resize_height = $hei;
        $this->cut = $c;
		if (preg_match("/jpg/i",$image_type) || preg_match("/jpeg/i",$image_type)) {
			$this->type="jpg";
		}
	
		elseif (preg_match("/gif/i",$image_type)) {
			$this->type="gif";
		}

		elseif (preg_match("/png/i",$image_type) || preg_match("/png/i",$image_type)) {
			$this->type="png";
		}

		else {
			echo "Not Supported File";
			exit();
		}
        $this->initi_img();
        $this -> dst_img($target);
        $this->width = imagesx($this->im);
        $this->height = imagesy($this->im);
		// add by stan
		if (!$this->resize_height) {
			$this->resize_height = $this->resize_width*($this->height/$this->width);echo('46<br>');
		}
		if (!$this->resize_width) {
			$this->resize_width = $this->resize_height*($this->width/$this->height);echo('49<br>');
		}
        $this->newimg($qu);
        ImageDestroy ($this->im);
    }
    function newimg($qu)
    {
        $resize_ratio = ($this->resize_width)/($this->resize_height);
        $ratio = ($this->width)/($this->height);
		if ($ratio>=$resize_ratio) {
			$offset_x = 0;
			$offset_y = ceil(($this->resize_height - $this->resize_width/$ratio)/2);
			$copy_width = $this->resize_width;
			$copy_height = $this->resize_height/$ratio;
		}
		else {
			$offset_y = 0;
			$offset_x = ceil(($this->resize_width-$this->resize_height*$ratio)/2);
			$copy_width = $this->resize_height*$ratio;
			$copy_height = $this->resize_height;
		}
        if(($this->cut)=="1")
        {
            if($ratio>=$resize_ratio)
            {
                $newimg = imagecreatetruecolor($this->resize_width,$this->resize_height);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $this->resize_width,$this->resize_height, (($this->height)*$resize_ratio), $this->height);
                ImageJpeg ($newimg,$this->dstimg,$qu);
            }
            if($ratio<$resize_ratio)
            {
                $newimg = imagecreatetruecolor($this->resize_width,$this->resize_height);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $this->resize_width, $this->resize_height, $this->width, (($this->width)/$resize_ratio));
                ImageJpeg ($newimg,$this->dstimg,$qu);
            }
        }
        else
        {
            if ($this->fill == 'black') {
                $newimg = imagecreatetruecolor($this->resize_width,$this->resize_height);
				$bg = imagecolorallocate($newimg, 0, 0, 0);
				imagefill($newimg, 0, 0, $bg);
                imagecopyresampled($newimg, $this->im, $offset_x, $offset_y, 0, 0, $copy_width, $copy_height, $this->width, $this->height);
                ImageJpeg ($newimg,$this->dstimg,$qu);
			}
			elseif ($this->fill == 'white') {
                $newimg = imagecreatetruecolor($this->resize_width,$this->resize_height);
				$bg = imagecolorallocate($newimg, 0, 0, 0);
				imagefill($newimg, 0, 0, $bg);
                imagecopyresampled($newimg, $this->im, $offset_x, $offset_y, 0, 0, $copy_width, $copy_height, $this->width, $this->height);
                ImageJpeg ($newimg,$this->dstimg,$qu);
			}
			elseif($ratio>=$resize_ratio)
            {
                $newimg = imagecreatetruecolor($this->resize_width,($this->resize_width)/$ratio);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $this->resize_width, ($this->resize_width)/$ratio, $this->width, $this->height);
                ImageJpeg ($newimg,$this->dstimg,$qu);
            }
            elseif($ratio<$resize_ratio)
            {
                $newimg = imagecreatetruecolor(($this->resize_height)*$ratio,$this->resize_height);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, ($this->resize_height)*$ratio, $this->resize_height, $this->width, $this->height);
                ImageJpeg ($newimg,$this->dstimg,$qu);
            }
        }
    }
    function initi_img()
    {
        if($this->type=="jpg")
        {
            if (!$this->im = imagecreatefromjpeg($this->srcimg))
				die('This is not a pic:'.$this->srcimg);
        }
        if($this->type=="gif")
        {
            if (!$this->im = imagecreatefromgif($this->srcimg))
				die('This is not a pic:'.$this->srcimg);
        }
        if($this->type=="png")
        {
            if (!$this->im = imagecreatefrompng($this->srcimg))
				die('This is not a pic:'.$this->srcimg);
        }
    }
    function dst_img($target)
    {
        $full_length  = strlen($this->srcimg);
        $type_length  = strlen($this->type);
        $name_length  = $full_length-$type_length;
        $name         = substr($this->srcimg,0,$name_length-1);
        $this->dstimg = $target.".".$this->type;
    }

	function type() {
	
	}
}