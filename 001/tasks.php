<h1>Uzdavinys 1</h1>
<?php
$name = 'Kasparas';
$surname = 'Gri';
$birthYear = 1992;
$yearNow = date("Y");
$myYears = $yearNow - $birthYear;

echo "Aš esu $name $surname. Man yra $myYears metai(ų)";

?>
<h1>Uzdavinys 2</h1>
<?php
$num1 = rand(0, 4);
$num2 = rand(0, 4);
if ($num1 > $num2) {
  if ($num2 === 0) {
    echo 'Dalyba is nulio negalima';
  } else {
    echo $num1 / $num2;
  }
} else {
  if ($num1 === 0) {
    echo 'Dalyba is nulio negalima';
  } else {
    echo $num2 / $num1;
  }
}

?>
<h1>Uzdavinys 3</h1>
<?php
$num1 = rand(0, 25);
$num2 = rand(0, 25);
$num3 = rand(0, 25);
echo $num1 . '<br>', $num2 . '<br>', $num3 . '<br>';
// if ($num1 > $num2 && $num2 > $num3) {
//   echo $num2;
// } else if ($num1 > $num2 && $num2 < $num3) {
//   echo $num3;
// } else if ($num1 < $num2 && $num1 > $num3) {
//   echo $num3;
// } else if ($num1 < $num2 && $num1 < $num3) {
//   echo $num1;
// }
if ($num1 > $num2) {
  if ($num1 > $num3) {
    if ($num2 > $num3) {
      echo $num2;
    } else {
      echo $num3;
    }
  } else {
    echo $num1;
  }
} else {
  if ($num2 > $num3) {
    if ($num1 > $num3) {
      echo $num1;
    } else {
      echo $num3;
    }
  } else {
    echo $num2;
  }
}

?>
<h1>Uzdavinys 4</h1>
<?php
$num1 = rand(1, 10);
$num2 = rand(1, 10);
$num3 = rand(1, 10);
echo $num1 . '<br>', $num2 . '<br>', $num3 . '<br>';
if ($num1 + $num2 > $num3 && $num2 + $num3 > $num1 && $num1 + $num3 > $num2) {
  echo 'Trikampis gali susidaryti';
} else {
  echo 'Trikampis negali susidaryti';
}
?>
<h1>Uzdavinys 5</h1>
<?php
$num1 = rand(0, 2);
$num2 = rand(0, 2);
$num3 = rand(0, 2);
$num4 = rand(0, 2);
echo $num1 . '<br>', $num2 . '<br>', $num3 . '<br>', $num4 . '<br>';
$zeros = 0;
$ones = 0;
$twos = 0;
if ($num1 === 0) {
  $zeros += 1;
}
if ($num2 === 0) {
  $zeros += 1;
}
if ($num3 === 0) {
  $zeros += 1;
}
if ($num4 === 0) {
  $zeros += 1;
}
if ($num1 === 1) {
  $ones += 1;
}
if ($num2 === 1) {
  $ones += 1;
}
if ($num3 === 1) {
  $ones += 1;
}
if ($num4 === 1) {
  $ones += 1;
}
$twos = 4 - $ones - $zeros;
echo "Nuliu: $zeros, vienetu: $ones, dvejetu: $twos"

?>
<h1>Uzdavinys 6</h1>

<?php
$num = rand(1, 6);
echo "<h1>$num</h1>";
?>
<h1>Uzdavinys 7</h1>
<?php
$num1 = rand(-10, 10);
$num2 = rand(-10, 10);
$num3 = rand(-10, 10);
$color1 = '';
$color2 = '';
$color3 = '';
echo $num1 . '<br>', $num2 . '<br>', $num3 . '<br>';
if ($num1 === 0) {
  $color1 = 'red';
} else if ($num1 < 0) {
  $color1 = 'green';
} else {
  $color1 = 'blue';
}
if ($num2 === 0) {
  $color2 = 'red';
} else if ($num2 < 0) {
  $color2 = 'green';
} else {
  $color2 = 'blue';
}
if ($num3 === 0) {
  $color3 = 'red';
} else if ($num3 < 0) {
  $color3 = 'green';
} else {
  $color3 = 'blue';
}
echo "<p style=color:$color1>$num1</p> <p style=color:$color2>$num2</p> <p style=color:$color3>$num3</p>"

?>
<h1>Uzdavinys 8</h1>
<?php
$count = rand(5, 3000);
$candlePrice = 1;
$price = 0;
if ($count > 2000) {
  $price = $count * 0.96;
  $candlePrice = $price / $count;
} else {
  $price = $count * 1;
}
echo "Perkama $count zvakiu, po $candlePrice, viso $price";
?>
<h1>Uzdavinys 9</h1>
<?php
$num1 = rand(0, 100);
$num2 = rand(0, 100);
$num3 = rand(0, 100);
$numCount = 3;
$average = 0;
echo $num1 . '<br>', $num2 . '<br>', $num3 . '<br>';
if ($num1 < 10 || $num1 > 90) {
  $num1 = 0;
  $numCount -= 1;
}
if ($num2 < 10 || $num2 > 90) {
  $num2 = 0;
  $numCount -= 1;
}
if ($num3 < 10 || $num3 > 90) {
  $num3 = 0;
  $numCount -= 1;
}
if ($numCount === 0) {
  echo 'Visi skaiciai netinka';
} else {
  $average = round(($num1 + $num2 + $num3) / $numCount);
  echo "Aritmetinis vidurkis $average";
}

?>
<h1>Uzdavinys 10</h1>
<?php
$h = date("H");
$min = date("i");
$sec = date("s");
$numH = 0;
$numMin = 0;
$numSec = rand(0, 300);
echo $numSec . '<br>';
echo "$h:$min:$sec" . '<br>';
if ($numSec > 60) {
  $numMin = floor($numSec / 60);
  $numSec = $numSec % 60;
}
echo $numMin . '<br>', $numSec . '<br>';
$sec += $numSec;
if ($sec >= 60) {
  $sec %= 60;
  $min += 1;
}
$min += $numMin;
if ($min >= 60) {
  $min %= 60;
  $h += 1;
}
echo "$h:$min:$sec";
?>
<h1>Uzdavinys 11</h1>
<?php
$num1 = rand(1000, 9999);
$num2 = rand(1000, 9999);
$num3 = rand(1000, 9999);
$num4 = rand(1000, 9999);
$num5 = rand(1000, 9999);
$num6 = rand(1000, 9999);
$numPos1 = 0;
$numPos2 = 0;
$numPos3 = 0;
$numPos4 = 0;
$numPos5 = 0;
$numPos6 = 0;
echo $num1 . '<br>', $num2 . '<br>', $num3 . '<br>', $num4 . '<br>', $num5 . '<br>', $num6 . '<br>';

// function findPosition($num1, $num2, $num3, $num4, $num5, $num6, &$numPos1, &$numPos2, &$numPos3, &$numPos4, &$numPos5, &$numPos6)
// {
if ($num1 > $num2) {
  if ($num1 > $num3) {
    if ($num1 > $num4) {
      if ($num1 > $num5) {
        if ($num1 > $num6) {
          $numPos1 = $num1;
        } else {
          $numPos2 = $num1;
        }
      } else {
        if ($num1 > $num6) {
          $numPos2 = $num1;
        } else {
          $numPos3 = $num1;
        }
      }
    } else {
      if ($num1 > $num5) {
        if ($num1 > $num6) {
          $numPos2 = $num1;
        } else {
          $numPos3 = $num1;
        }
      } else {
        if ($num1 > $num6) {
          $numPos3 = $num1;
        } else {
          $numPos4 = $num1;
        }
      }
    }
  } else {
    if ($num1 > $num4) {
      if ($num1 > $num5) {
        if ($num1 > $num6) {
          $numPos2 = $num1;
        } else {
          $numPos3 = $num1;
        }
      } else {
        if ($num1 > $num6) {
          $numPos3 = $num1;
        } else {
          $numPos4 = $num1;
        }
      }
    } else {
      if ($num1 > $num5) {
        if ($num1 > $num6) {
          $numPos3 = $num1;
        } else {
          $numPos4 = $num1;
        }
      } else {
        if ($num1 > $num6) {
          $numPos4 = $num1;
        } else {
          $numPos5 = $num1;
        }
      }
    }
  }
} else {
  if ($num1 > $num3) {
    if ($num1 > $num4) {
      if ($num1 > $num5) {
        if ($num1 > $num6) {
          $numPos2 = $num1;
        } else {
          $numPos3 = $num1;
        }
      } else {
        if ($num1 > $num6) {
          $numPos3 = $num1;
        } else {
          $numPos4 = $num1;
        }
      }
    } else {
      if ($num1 > $num5) {
        if ($num1 > $num6) {
          $numPos3 = $num1;
        } else {
          $numPos4 = $num1;
        }
      } else {
        if ($num1 > $num6) {
          $numPos4 = $num1;
        } else {
          $numPos5 = $num1;
        }
      }
    }
  } else {
    if ($num1 > $num4) {
      if ($num1 > $num5) {
        if ($num1 > $num6) {
          $numPos3 = $num1;
        } else {
          $numPos4 = $num1;
        }
      } else {
        if ($num1 > $num6) {
          $numPos4 = $num1;
        } else {
          $numPos5 = $num1;
        }
      }
    } else {
      if ($num1 > $num5) {
        if ($num1 > $num6) {
          $numPos4 = $num1;
        } else {
          $numPos5 = $num1;
        }
      } else {
        if ($num1 > $num6) {
          $numPos5 = $num1;
        } else {
          $numPos6 = $num1;
        }
      }
    }
  }
}
// }

// findPosition($num1, $num2, $num3, $num4, $num5, $num6, $numPos1, $numPos2, $numPos3, $numPos4, $numPos5, $numPos6);
// findPosition($num2, $num3, $num4, $num5, $num6, $num1, $numPos1, $numPos2, $numPos3, $numPos4, $numPos5, $numPos6);
// findPosition($num3, $num4, $num5, $num6, $num1, $num2, $numPos1, $numPos2, $numPos3, $numPos4, $numPos5, $numPos6);
// findPosition($num4, $num5, $num6, $num1, $num2, $num3, $numPos1, $numPos2, $numPos3, $numPos4, $numPos5, $numPos6);
// findPosition($num5, $num6, $num1, $num2, $num3, $num4, $numPos1, $numPos2, $numPos3, $numPos4, $numPos5, $numPos6);
// findPosition($num6, $num1, $num2, $num3, $num4, $num5, $numPos1, $numPos2, $numPos3, $numPos4, $numPos5, $numPos6);

if ($num2 > $num1) {
  if ($num2 > $num3) {
    if ($num2 > $num4) {
      if ($num2 > $num5) {
        if ($num2 > $num6) {
          $numPos1 = $num2;
        } else {
          $numPos2 = $num2;
        }
      } else {
        if ($num2 > $num6) {
          $numPos2 = $num2;
        } else {
          $numPos3 = $num2;
        }
      }
    } else {
      if ($num2 > $num5) {
        if ($num2 > $num6) {
          $numPos2 = $num2;
        } else {
          $numPos3 = $num2;
        }
      } else {
        if ($num2 > $num6) {
          $numPos3 = $num2;
        } else {
          $numPos4 = $num2;
        }
      }
    }
  } else {
    if ($num2 > $num4) {
      if ($num2 > $num5) {
        if ($num2 > $num6) {
          $numPos2 = $num2;
        } else {
          $numPos3 = $num2;
        }
      } else {
        if ($num2 > $num6) {
          $numPos3 = $num2;
        } else {
          $numPos4 = $num2;
        }
      }
    } else {
      if ($num2 > $num5) {
        if ($num2 > $num6) {
          $numPos3 = $num2;
        } else {
          $numPos4 = $num2;
        }
      } else {
        if ($num2 > $num6) {
          $numPos4 = $num2;
        } else {
          $numPos5 = $num2;
        }
      }
    }
  }
} else {
  if ($num2 > $num3) {
    if ($num2 > $num4) {
      if ($num2 > $num5) {
        if ($num2 > $num6) {
          $numPos2 = $num2;
        } else {
          $numPos3 = $num2;
        }
      } else {
        if ($num2 > $num6) {
          $numPos3 = $num2;
        } else {
          $numPos4 = $num2;
        }
      }
    } else {
      if ($num2 > $num5) {
        if ($num2 > $num6) {
          $numPos3 = $num2;
        } else {
          $numPos4 = $num2;
        }
      } else {
        if ($num2 > $num6) {
          $numPos4 = $num2;
        } else {
          $numPos5 = $num2;
        }
      }
    }
  } else {
    if ($num2 > $num4) {
      if ($num2 > $num5) {
        if ($num2 > $num6) {
          $numPos3 = $num2;
        } else {
          $numPos4 = $num2;
        }
      } else {
        if ($num2 > $num6) {
          $numPos4 = $num2;
        } else {
          $numPos5 = $num2;
        }
      }
    } else {
      if ($num2 > $num5) {
        if ($num2 > $num6) {
          $numPos4 = $num2;
        } else {
          $numPos5 = $num2;
        }
      } else {
        if ($num2 > $num6) {
          $numPos5 = $num2;
        } else {
          $numPos6 = $num2;
        }
      }
    }
  }
}
// ---------------------------------------------------------------------

if ($num3 > $num1) {
  if ($num3 > $num2) {
    if ($num3 > $num4) {
      if ($num3 > $num5) {
        if ($num3 > $num6) {
          $numPos1 = $num3;
        } else {
          $numPos2 = $num3;
        }
      } else {
        if ($num3 > $num6) {
          $numPos2 = $num3;
        } else {
          $numPos3 = $num3;
        }
      }
    } else {
      if ($num3 > $num5) {
        if ($num3 > $num6) {
          $numPos2 = $num3;
        } else {
          $numPos3 = $num3;
        }
      } else {
        if ($num3 > $num6) {
          $numPos3 = $num3;
        } else {
          $numPos4 = $num3;
        }
      }
    }
  } else {
    if ($num3 > $num4) {
      if ($num3 > $num5) {
        if ($num3 > $num6) {
          $numPos2 = $num3;
        } else {
          $numPos3 = $num3;
        }
      } else {
        if ($num3 > $num6) {
          $numPos3 = $num3;
        } else {
          $numPos4 = $num3;
        }
      }
    } else {
      if ($num3 > $num5) {
        if ($num3 > $num6) {
          $numPos3 = $num3;
        } else {
          $numPos4 = $num3;
        }
      } else {
        if ($num3 > $num6) {
          $numPos4 = $num3;
        } else {
          $numPos5 = $num3;
        }
      }
    }
  }
} else {
  if ($num3 > $num2) {
    if ($num3 > $num4) {
      if ($num3 > $num5) {
        if ($num3 > $num6) {
          $numPos2 = $num3;
        } else {
          $numPos3 = $num3;
        }
      } else {
        if ($num3 > $num6) {
          $numPos3 = $num3;
        } else {
          $numPos4 = $num3;
        }
      }
    } else {
      if ($num3 > $num5) {
        if ($num3 > $num6) {
          $numPos3 = $num3;
        } else {
          $numPos4 = $num3;
        }
      } else {
        if ($num3 > $num6) {
          $numPos4 = $num3;
        } else {
          $numPos5 = $num3;
        }
      }
    }
  } else {
    if ($num3 > $num4) {
      if ($num3 > $num5) {
        if ($num3 > $num6) {
          $numPos3 = $num3;
        } else {
          $numPos4 = $num3;
        }
      } else {
        if ($num3 > $num6) {
          $numPos4 = $num3;
        } else {
          $numPos5 = $num3;
        }
      }
    } else {
      if ($num3 > $num5) {
        if ($num3 > $num6) {
          $numPos4 = $num3;
        } else {
          $numPos5 = $num3;
        }
      } else {
        if ($num3 > $num6) {
          $numPos5 = $num3;
        } else {
          $numPos6 = $num3;
        }
      }
    }
  }
}

// ---------------------------------------------------------------------

if ($num4 > $num1) {
  if ($num4 > $num2) {
    if ($num4 > $num3) {
      if ($num4 > $num5) {
        if ($num4 > $num6) {
          $numPos1 = $num4;
        } else {
          $numPos2 = $num4;
        }
      } else {
        if ($num4 > $num6) {
          $numPos2 = $num4;
        } else {
          $numPos3 = $num4;
        }
      }
    } else {
      if ($num4 > $num5) {
        if ($num4 > $num6) {
          $numPos2 = $num4;
        } else {
          $numPos3 = $num4;
        }
      } else {
        if ($num4 > $num6) {
          $numPos3 = $num4;
        } else {
          $numPos4 = $num4;
        }
      }
    }
  } else {
    if ($num4 > $num3) {
      if ($num4 > $num5) {
        if ($num4 > $num6) {
          $numPos2 = $num4;
        } else {
          $numPos3 = $num4;
        }
      } else {
        if ($num4 > $num6) {
          $numPos3 = $num4;
        } else {
          $numPos4 = $num4;
        }
      }
    } else {
      if ($num4 > $num5) {
        if ($num4 > $num6) {
          $numPos3 = $num4;
        } else {
          $numPos4 = $num4;
        }
      } else {
        if ($num4 > $num6) {
          $numPos4 = $num4;
        } else {
          $numPos5 = $num4;
        }
      }
    }
  }
} else {
  if ($num4 > $num2) {
    if ($num4 > $num3) {
      if ($num4 > $num5) {
        if ($num4 > $num6) {
          $numPos2 = $num4;
        } else {
          $numPos3 = $num4;
        }
      } else {
        if ($num4 > $num6) {
          $numPos3 = $num4;
        } else {
          $numPos4 = $num4;
        }
      }
    } else {
      if ($num4 > $num5) {
        if ($num4 > $num6) {
          $numPos3 = $num4;
        } else {
          $numPos4 = $num4;
        }
      } else {
        if ($num4 > $num6) {
          $numPos4 = $num4;
        } else {
          $numPos5 = $num4;
        }
      }
    }
  } else {
    if ($num4 > $num3) {
      if ($num4 > $num5) {
        if ($num4 > $num6) {
          $numPos3 = $num4;
        } else {
          $numPos4 = $num4;
        }
      } else {
        if ($num4 > $num6) {
          $numPos4 = $num4;
        } else {
          $numPos5 = $num4;
        }
      }
    } else {
      if ($num4 > $num5) {
        if ($num4 > $num6) {
          $numPos4 = $num4;
        } else {
          $numPos5 = $num4;
        }
      } else {
        if ($num4 > $num6) {
          $numPos5 = $num4;
        } else {
          $numPos6 = $num4;
        }
      }
    }
  }
}


// ---------------------------------------------------------------------

if ($num5 > $num1) {
  if ($num5 > $num2) {
    if ($num5 > $num3) {
      if ($num5 > $num4) {
        if ($num5 > $num6) {
          $numPos1 = $num5;
        } else {
          $numPos2 = $num5;
        }
      } else {
        if ($num5 > $num6) {
          $numPos2 = $num5;
        } else {
          $numPos3 = $num5;
        }
      }
    } else {
      if ($num5 > $num4) {
        if ($num5 > $num6) {
          $numPos2 = $num5;
        } else {
          $numPos3 = $num5;
        }
      } else {
        if ($num5 > $num6) {
          $numPos3 = $num5;
        } else {
          $numPos4 = $num5;
        }
      }
    }
  } else {
    if ($num5 > $num3) {
      if ($num5 > $num4) {
        if ($num5 > $num6) {
          $numPos2 = $num5;
        } else {
          $numPos3 = $num5;
        }
      } else {
        if ($num5 > $num6) {
          $numPos3 = $num5;
        } else {
          $numPos4 = $num5;
        }
      }
    } else {
      if ($num5 > $num4) {
        if ($num5 > $num6) {
          $numPos3 = $num5;
        } else {
          $numPos4 = $num5;
        }
      } else {
        if ($num5 > $num6) {
          $numPos4 = $num5;
        } else {
          $numPos5 = $num5;
        }
      }
    }
  }
} else {
  if ($num5 > $num2) {
    if ($num5 > $num3) {
      if ($num5 > $num4) {
        if ($num5 > $num6) {
          $numPos2 = $num5;
        } else {
          $numPos3 = $num5;
        }
      } else {
        if ($num5 > $num6) {
          $numPos3 = $num5;
        } else {
          $numPos4 = $num5;
        }
      }
    } else {
      if ($num5 > $num4) {
        if ($num5 > $num6) {
          $numPos3 = $num5;
        } else {
          $numPos4 = $num5;
        }
      } else {
        if ($num5 > $num6) {
          $numPos4 = $num5;
        } else {
          $numPos5 = $num5;
        }
      }
    }
  } else {
    if ($num5 > $num3) {
      if ($num5 > $num4) {
        if ($num5 > $num6) {
          $numPos3 = $num5;
        } else {
          $numPos4 = $num5;
        }
      } else {
        if ($num5 > $num6) {
          $numPos4 = $num5;
        } else {
          $numPos5 = $num5;
        }
      }
    } else {
      if ($num5 > $num4) {
        if ($num5 > $num6) {
          $numPos4 = $num5;
        } else {
          $numPos5 = $num5;
        }
      } else {
        if ($num5 > $num6) {
          $numPos5 = $num5;
        } else {
          $numPos6 = $num5;
        }
      }
    }
  }
}

if ($numPos1 === 0) {
  $numPos1 = $num6;
} else if ($numPos2 === 0) {
  $numPos2 = $num6;
} else if ($numPos3 === 0) {
  $numPos3 = $num6;
} else if ($numPos4 === 0) {
  $numPos4 = $num6;
} else if ($numPos5 === 0) {
  $numPos5 = $num6;
} else if ($numPos6 === 0) {
  $numPos6 = $num6;
}

echo "$numPos1 $numPos2 $numPos3 $numPos4 $numPos5 $numPos6"
?>