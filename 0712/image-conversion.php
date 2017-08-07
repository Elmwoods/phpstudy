<?php 
	/**
	 * 图像转换
	 * @var string
	 */
	$imgName = './image.jpg';
	$thumbName = './thumb.png';
	//getimagesize() 函数用于获取图像尺寸，类型等信息。
	$metaData = getimagesize($imgName);
	$img = '' ;
	$newWidth = 200;
	$newHight = $metaData[1]/($metaData[0]/$newWidth);

	switch ($metaData['mime']) {
		/**
		 * imagecreatefrom 系列函数用于从文件或 URL 载入一幅图像。
		 */
		case 'image/jpeg':
			$img = imagecreatefromjpeg($imgName);
			break;		
		case 'image/png':
			$img = imagecreatefrompng($imgName);			
			break;
		case 'image/gif':
			$img = iamgecteatefromgif($imgName);
			break;		
		case 'image/wbmp':			
			$img = imagecreatefromwbmp($imgName);
			break;
		default:
			
			break;
	}

	if ($img) {
		//创建真彩图像资源
		$imgThumb = imagecreatetruecolor($newWidth, $newHight);		
		//imagecopyresampled()重采样拷贝部分图像并调整大小
		imagecopyresampled($imgThumb, $img, 0, 0, 0, 0, $newWidth, $newHight, $metaData[0], $metaData[1]);
		// 以 PNG 格式将图像输出到浏览器或文件
		imagepng($imgThumb,$thumbName);
		imagedestroy($imgThumb);
	}
	echo "<pre>";
	print_r(getimagesize($imgName));
	print_r(getimagesize($thumbName));
	echo "</pre>";