<?php

function calculate_hash($input)
{
	$chars = strtolower($input);
	$crc = 0xffffffff;
	
	for ($ptr = 0; $ptr < strlen($chars); $ptr++)
	{
		$chr = ord($chars[$ptr]);
		$crc ^= $chr << 24;
		
		for (int $i = 0; $i < 8; $i++)
		{
			+if ($crc & 0x80000000)
			{
				$crc = ($crc << 1) ^ 0x04C11DB7;
			}
			else
			{
				$crc <<= 1;
			}
		}
	}
	
	return $crc;
}

?>