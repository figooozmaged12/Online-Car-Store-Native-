<?php
// #####################################
// ## Implementing Built-in Functions ##
// #####################################

// ### 1 ###

// str_repeat() Function
// Function Accept 4 Parameters
// It can also add Spaces and new lines 
//by (Passing any True value on Parameter number 3(Spaces) & 4(Lines))
//time : 10mins

function shady_str_repeat(string $string1,int $number=2, bool $space=false , bool $newline= false)
{
    $string2 = "";
    $separator= "";
    $AddNewLine="";

    if($newline===true){$space=false;}
            $AddNewLine = $newline? "<br>":"";
            $separator = $space ? " ":"";
      
    for($x=1; $x<=$number; $x++){
            $string2 .=$string1.$separator.$AddNewLine;  
        }

        return $string2;
    }
//Testing

echo"<br>";
echo shady_str_repeat("shady",3,true,1);
echo"<br>";
echo shady_str_repeat("shady",5,true,"s");
echo"<br>";
echo shady_str_repeat("shady",5);
echo"<br>";

// ### 2 ###

// strlen() Function
// Function Accept 1 Parameters ($string)
// It return the number of characters of the passed string
//time : 10mins

   function shady_strlen(string $str){

    $counter = 0;
    while(empty($str[$counter])===false)
    {
            $counter++;
    }

    return $counter;
   

}
//Testing
echo"<br>";
echo shady_strlen("");
echo"<br>";
echo shady_strlen(" ");
echo "<br>";
echo shady_strlen("shady2221322312323113");




// ### 3 ###

// str_split() Function
// Function Accept 1 Parameters ($string)
// It convert the passed string into array of characters
//time : 10mins
$str1 ="shaaaaaady";


function shady_str_split(string $str){
    $emptyArray=[];
    for($i=0;$i<shady_strlen($str);$i++)
    {
        $emptyArray[$i] = $str[$i];
    }
    return $emptyArray;

}

$array = shady_str_split($str1);
echo"<pre>";
print_r($array);
echo"</pre>";




// ### 4 ###


// array_count_values() Function
// Function Accept 1 Parameters ($array)
// It counts the number of elements in side the array for each unique key
//time : 30mins

$array1 = ["a","b","c","c","d","c","a","a","a","h","h","s","s","y","y","y"];
echo "<pre>";
print_r(array_count_values($array1));
echo "</pre>";


function shady_array_count_values(array $array){
        $valuesArray=[];
        $uniqueKeyArray=[];
        $Result=[];
        $counter= 0;  
        $counter5 = 0;
        $valuesArrayCounter=0;
        $keycounter = 0;
        foreach($array as $element): //loop to make array for unique keys
            if(in_array($element,$uniqueKeyArray)) {continue;}
            $uniqueKeyArray[$counter] = $element;
            $counter++;
        endforeach;

        for($i=0; $i<count($uniqueKeyArray);$i++): //Loop according to number of unique key elements

            foreach($array as $element): //Loop to make values array
                    if($element == $uniqueKeyArray[$valuesArrayCounter]){$counter5++;}                                 
                endforeach;
            $valuesArray[$valuesArrayCounter] = $counter5;
            $valuesArrayCounter++;
            $keycounter++; 
            $counter5 = 0;
            endfor;
            $Result = array_combine($uniqueKeyArray,$valuesArray); // combine both together
            return $Result;
              
}//end of the function

//Testing
echo "<pre>";
print_r (shady_array_count_values($array1));
echo "</pre>";
echo "<br>";


// ### 5 ###


// shuffle() Function
// Function Accept 1 Parameters ($array)
// It shuffles the order of array elements
//time : 1hour

$Names=["shady","maram","ssss","garen","mord","mrfana","ay7aga"];
$numbers = [1,2,3,4,5,6,76,7,8,9];

function shady_shuffle( array $array){

    $randomNum = rand(0,count($array)-1);
    $emptyArray=[];
    $counter = 0;

    for($i=0; $i<count($array);$i++):

        while(in_array($array[$randomNum],$emptyArray)){
            $randomNum = rand(0,count($array)-1);
        }
        $emptyArray[$counter] = $array[$randomNum];
        $counter++;
    endfor;
   return $emptyArray;
}// end of Shady_shuffle function

//Testing
$array1 = shady_shuffle($numbers);
echo "<pre>";
print_r($array1);
echo "</pre>";

// ### 5 ###

// string_contain Function
// Function Accept 2 Parameters ($haystack[Required] , $needle[Required])
// It search if the needle exist on the haystack or not,
// and it returns the number of needle existance within the haystack
//  and => 0 on false
//time : 2hour


function shady_substr_count(string $haystack,string $needle){
    //arrays
    $array=[];
    $resultarray=[];

    //counters
    $haystackCounter=0; 
    $arraycounter=0; 
    $resultarraycounter=0; 
    $sscounter = 0; 

    // final result
    $result = 0;
    $needleCount=0;

    for($x=0;$x<strlen($haystack);$x++):
       
        if($needle[0] == $haystack[$haystackCounter]){
          
                $array[$arraycounter] = $haystackCounter;
                $arraycounter++;     
        }
        $haystackCounter++; 
    endfor;
    
    for($i=0;$i<count($array);$i++):
        $resultarray[$resultarraycounter] = substr($haystack,$array[$sscounter],strlen($needle));
        $resultarraycounter++;
        $sscounter++;
    endfor;

    foreach($resultarray as $elements):
        if($elements == $needle){
            $result++;
        }
    endforeach;

    return $result;
    error_reporting(0);

    
}
//testing
$txt = "maged maged maged mazens mahdy";
echo shady_substr_count($txt,"maaged"); //0
echo shady_substr_count($txt,"maged"); // 3
echo shady_substr_count($txt,"maazerb"); // 0
echo shady_substr_count($txt,"mazen");//1
echo shady_substr_count($txt,"a"); //5

