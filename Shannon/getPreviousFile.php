

<?php 
//CURRENT ISSUE: Cant previous if previous was done from endOfFile.jpg.
$currentSlide = $_POST['currentSlide'];
$isPreview = $_POST['isPreview'];

$previousSlide = "";
$count = 0;
$fileIndex = 0;
$endOfFile = True;

$slide[] = "Slide1.JPG";
$slide[] = "Slide2.JPG";
$slide[] = "Slide3.JPG";
$slide[] = "Slide4.JPG";
$slide[] = "Slide5.JPG";

if ($currentSlide == "") 
{
	//$myObj->filename = $slide[0];
	$endOfFile = false;
	$previousSlide =  $slide[0];
}

else 
{
  foreach($slide as $slideFilename) 
	{    
		if ($slideFilename == $currentSlide) 
		{
			if ($count == 0 || $count == 1)
			{
				$previousSlide = $slide[$fileIndex];
				$endOfFile = false;
			}
			else
			{
				$fileIndex = $count;

				//If this page is called via Process Preview, return the file before the current
				//Otherwise, return the file 2 before the current.
				if ($isPreview == 'True')
				{
					$fileIndex = $fileIndex - 1;
				}
				else 
				{
					$fileIndex = $fileIndex - 2;
				}
				
				$previousSlide = $slide[$fileIndex];
				$endOfFile = false;
			} 
		}

		$count++;
	}
}

//If current slide is endOfFile.JPG, then set it to the last file.
//May need extra checking, what if the file isnt in the notepad????
if ($endOfFile)
{
	$fileIndex = $count - 1;
	$previousSlide = $slide[$fileIndex];
}

echo $previousSlide;
//$myJSON = json_encode($myObj);
//echo $myJSON;
