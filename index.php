<?php
	
function _get_hash($file_path)
  {
    $chars = strtolower($file_path);
    $crc = 0xffffffff;

    for ($ptr = 0; $ptr < strlen($chars); $ptr++)
    {
      $chr = ord($chars[$ptr]);
      $crc ^= $chr << 24;

      for ((int) $i = 0; $i < 8; $i++)
      {
        if ($crc & 0x80000000)
        {
          $crc = ($crc << 1) ^ 0x04C11DB7;
        }
        else
        {
          $crc <<= 1;
        }
      }
    }

    // Is system 64 bits ?
    if (strpos(php_uname('m'), '_64') !== false)
    {

			//Formatting the output in a 8 character hex
			if ($crc>=0)
			{
				$hash = sprintf("%16s",sprintf("%x",sprintf("%u",$crc)));
			}
			else
			{
				$source = sprintf('%b', $crc);

				$hash = "";
				while ($source <> "")
				{
					$digit = substr($source, -4);
					$hash = dechex(bindec($digit)) . $hash;
					$source = substr($source, 0, -4);
				}
			}
			$hash = substr($hash, 8);
    }
    else
    {
			//Formatting the output in a 8 character hex
			if ($crc>=0)
			{
				$hash = sprintf("%08s",sprintf("%x",sprintf("%u",$crc)));
			}
			else
			{
				$source = sprintf('%b', $crc);

				$hash = "";
				while ($source <> "")
				{
					$digit = substr($source, -4);
					$hash = dechex(bindec($digit)) . $hash;
					$source = substr($source, 0, -4);
				}
			}
    }

    return $hash;
  }

$temp = _get_hash("/media/Media/Filmer/HD/The.Mummy.Returns.2001.720p.BluRay.DTS.x264-RuDE/");
echo $temp;

?>