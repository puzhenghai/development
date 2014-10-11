<?php
namespace components\helper;

class HImage {

	private $type = NULL;
	private $width = NULL;
	private $height = NULL;
	private $resize_width = NULL;
	private $resize_height = NULL;
	private $cut = 0;
	private $srcimg = NULL;
	private $dstimg = NULL;
	private $im = NULL;
	private $small_ext = "_small.";

	public function resizeImg($img, $wid, $hei, $c, $small_ext = "_thumb", $dst_img = "/trunk" ) {
		$this->srcimg = $img;
		$this->resize_width = $wid;
		$this->resize_height = $hei;
		$this->cut = $c;
		$this->small_ext = $small_ext;
		$this->dstimg = $dst_img;
		$this->type = substr( strrchr( $this->srcimg, "." ), 1 );
		$this->initi_img( );
		$this->dst_img( );
		$this->width = imagesx( $this->im );
		$this->height = imagesy( $this->im );
		$resize_ratio = $this->resize_width / $this->resize_height;
		$ratio = $this->width / $this->height;
		if ( $this->cut == "1" )
		{
			if ( $resize_ratio <= $ratio )
			{
				$newimg = imagecreatetruecolor( $this->resize_width, $this->resize_height );
				imagecopyresampled( $newimg, $this->im, 0, 0, 0, 0, $this->resize_width, $this->resize_height, $this->height * $resize_ratio, $this->height );
				imagejpeg( $newimg, $this->dstimg, 90 );
			}
			if ( $ratio < $resize_ratio )
			{
				$newimg = imagecreatetruecolor( $this->resize_width, $this->resize_height );
				imagecopyresampled( $newimg, $this->im, 0, 0, 0, 0, $this->resize_width, $this->resize_height, $this->width, $this->width / $resize_ratio );
				imagejpeg( $newimg, $this->dstimg, 90 );
			}
		}
		else
		{
			if ( 0 < $ratio )
			{
				$this->resize_height = $this->resize_width * $this->height / $this->width;
			}
			else
			{
				$this->resize_width = $this->resize_height * $this->width / $this->height;
			}
			$newimg = imagecreatetruecolor( $this->resize_width, $this->resize_height );
			imagecopyresampled( $newimg, $this->im, 0, 0, 0, 0, $this->resize_width, $this->resize_height, $this->width, $this->height );
			imagejpeg( $newimg, $this->dstimg, 90 );
		}
		imagedestroy( $this->im );
		imagedestroy( $newimg );
		return $this->dstimg;
	}

	private function initi_img( )
	{
		if ( $this->type == "jpg" )
		{
			$this->im = imagecreatefromjpeg( $this->srcimg );
		}
		if ( $this->type == "gif" )
		{
			$this->im = imagecreatefromgif( $this->srcimg );
		}
		if ( $this->type == "png" )
		{
			$this->im = imagecreatefrompng( $this->srcimg );
		}
		if ( $this->type == "jpeg" )
		{
			$this->im = imagecreatefromjpeg( $this->srcimg );
		}
	}

	private function dst_img( )
	{
		$full_length  = strlen($this->srcimg);
        $type_length  = strlen($this->type);
        $name_length  = $full_length-$type_length;
        $name  = substr($this->srcimg,0,$name_length-1);
        $this->dstimg = $dstpath;
	}

}
?>