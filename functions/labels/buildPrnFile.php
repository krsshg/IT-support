<?php

function createInternpostPRN($EGS,$TIL,$TLF,$AVD,$numCopies){
  global $prnFile;
  $prnFile = "label_gen".rand().".prn";
  $prn = fopen($prnFile, "w") or die("Unable to open file!");
  $txt = "CT~~CD,~CC^~CT~\n^XA~TA000~JSN^LT0^MNW^MTD^PON^PMN^LH0,0^JMA^PR5,5~SD15^JUS^LRN^CI0^XZ\n^XA\n^MMT\n^PW815\n^LL1007\n^LS0\n^FT765,199^A0B,34,33^FH\^FD21/02/2018^FS\n^FT206,927^A0B,135,134^FH\^FDInternpost^FS\n^FT479,927^A0B,62,62^FH\^FDTIL :^FS\n^FT671,926^A0B,62,62^FH\^FDAVD :^FS\n^FT582,607^A0B,62,62^FH\^FD$TLF^FS\n^FT575,927^A0B,62,62^FH\^FDTLF :^FS\n^FT671,607^A0B,62,62^FH\^FD$AVD^FS\n^FT479,608^A0B,62,62^FH\^FD$TIL^FS\n^FT384,607^A0B,62,62^FH\^FD$EGS^FS\n^FT383,926^A0B,62,62^FH\^FDEGS# :^FS\n^PQ$numCopies,0,1,Y^XZ";
  fwrite($prn, $txt);
  fclose($prn);
  }

function createBufferPRN($Avdeling){
  global $prnFile;
  $prnFile = "label_gen".rand().".prn";
  $prn = fopen($prnFile, "w") or die("Unable to open file!");
  $txt =
"CT~~CD,~CC^~CT~
^XA~TA000~JSN^LT0^MNW^MTD^PON^PMN^LH0,0^JMA^PR5,5~SD15^JUS^LRN^CI0^XZ
^XA
^MMT
^PW815
^LL1007
^LS0
^FO32,608^GFA,09216,09216,00024,:Z64:
eJztWbFu20gQXcpa4SACjIqwUXVlEB+MlIZT3Aawex0g9lemCPQB54afwjKQgCBlQBZydd/B8iAYxJWHU6HMLik7nHnrtS66JtAANoHx09Pj7OzM7Fqpk53sZD+qJU3T/AX8GdlMKcP9JdkXCY86fMr8gwbz6w6vZn1/vCL76Me/HEr5iD9t8ZFh+KlHfzqXPsePYmPxne656fvj4kl8JPjrp/m5jT9jv/bwjzz82qP/DMTeEWfYrxae/Enb9Roy/kD+RBOGHwXyh+MD+SP4A/kj9B89f5g/lD/vmB5f/jzkA8MH84fhffkTdfoN93vyp3vRKOMvfBGoD8zGnvjv8RkT5FtfH38of7g/wC/wPv2dRVz/kU3ooQ1c+5TY8BjuH5fFJcKnmYFbYNHUC+TPMoNKSrRaFec5kkN4EsM/Q/2lRm+gLX4m83lQlsUV2AM60yYF+KRJarSH05k2GgQo/hgXMcgfh5+D/KyTenQP8KbFc5sW42KA6g/ho7macL/lH/j5J0J/EReoB3T6Bd7yHxKf6ZdxMUX7d+7iP4k4P8Ufr+/NO1rfIQ/Rmd2/hcS7/mKk380ndx68dLf9C/kJDvOf6hsIv0tQ2OLpBXLkpy+g6Iv9+5P99V6i3diD6g/9oPzRyvUAUX+SHPcwTThYPwvawqh+Wm6AT+5piRH/nCoK4a+ZnnGprnD9jzz9/U+qEAh/49aX423+LCXcrS/JEfx2/gH0boCw0CH3T3H6kCA8QYww/cNKcT0KZb81F/1U7oELmJ6eieaqxP0ry3A/tdMh6o8PeDZfna9w/93jI4YP8fN6HtRvjPjbUW12KP9heNG/PPa4Xn18KP68/wbXl1ko/rz+hPmfp//RzBN/+378UeY3MD84WnAmXNwpWJ8z26wJf8Pq51VOxR/03z1e8tNw8gT/kNW385yGB6i/xU9Y/of4+X4M6efzSYif40P6ef0M6md27PhzC+k/nN8cpl/38V7+/f5lTSZUf/j1T6g+aIYP1n+m51j962T/zeh4rVANdsO5Fv6zqtrlSr3hfu2Gfy3y357eazX4wP3t5ZU8f/2xrLb/KHUL5ND4psWBodk09gVclf7G3OEiIzx7gbNyuVpXuXr7GeGN5g111Gw+0ellsGj6fr3HM0HETy/wt7ql75D4meYnpJHTf0+74I7j59fXc4F/US4L+3wr+X+jjwh80mxqegwA/6x99PHxv5XFq9utwBuET7qjHeBXCP9i3QoH+iGe+HOPfoiPt9u8UJcUf4k36iXkr3//Beo3M4mPSX/x8yuoH+E7fqgf8lv9by6J/3n4g/VX64P1U35C/Sjf4mqb2+qP9OP8dOv77Pyx+u3z/8sfRzwugX71cOTs8+92uwbHR96IWP279bqsgH6Eb+Mvb1Ae8T23i//rJdUgwJ8C/ID4E1uCmj4+8uAV6R8T/6pifldswQ3NRZO7CyBWP4m8rbnidomEE/+SDxD2vyPwwEPCX2828giftT3GcP+vubIvkHN/2hZp7rbXMyN0waTbIJ3sZCc72XfYV5hRwA8=:B3FC
^FT765,199^A0B,34,33^FH\^FD21/02/2018^FS
^FT381,968^A0B,203,201^FH\^FD$Avdeling^FS
^FT574,969^A0B,135,134^FH\^FDBUFFER^FS
^PQ1,0,1,Y^XZ";
  fwrite($prn, $txt);
  fclose($prn);

}

function printPRN($printerName){
  global $prnFile;
  $host = str_replace("\\","\\\\", $printerName);
  $command = "copy ".$prnFile." /B ".$host;
  shell_exec($command);
  unlink($prnFile);
}

 ?>
