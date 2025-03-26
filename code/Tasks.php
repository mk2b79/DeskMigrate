<?php

//$array = [1,2,2,3,4,4,5,6,7,8,9];

//$sum = array_sum($array) / count($array);
//echo $sum;

//for ($i = 0; $i < count($array); $i++) {
//    $isQniq = $array[$i];
//    for ($j = $i+1; $j < count($array); $j++) {
//        if ($array[$j] == $isQniq) {
//            unset($array[$j]);
//            $array = array_values($array);
//        }
//    }
//}
//echo $array;

//$array_2=[2,2,2,2,5,1,5,220,1221];
//function joinArray(array $array_1, array $array_2):array
//{
//    $new_array=array_unique(array_merge($array_1, $array_2));
//    return $new_array;
//}
//$new_array = joinArray($array, $array_2);


//$array= [1,2,3,4,5,6,7,8,9,2,2,2,2];
//$countItem=4;
//$pages=ceil(count($array) / $countItem);
//
//$new_array=[];
//
//for($i=0;$i<$pages;$i++){
//    $new_array[$i]=array_slice($array,$i*$countItem,$countItem);
//}

//$array = [
//    [
//        'first_name' => 'Igor',
//        'last_name'  => 'Kril'
//    ],
//    [
//        'first_name' => 'Dima',
//        'last_name'  => 'Lazarchuk'
//    ],
//    [
//        'first_name' => 'Yura',
//        'last_name'  => 'Kril'
//    ]
//];

//foreach ($array as &$item) {
//    $item['name'] = $item["first_name"] . ' ' . $item["last_name"];
//}

//for($i=0; $i<count($array); $i++) {
//    $array[$i]['name'] = $array[$i]['first_name'] . ' ' . $array[$i]['last_name'];
//}

//foreach ($array as $key => $item) {
//    $array[$key] += ['name' => $array[$key]['first_name'] . ' ' . $array[$key]['last_name']];
//}

//$users = [
//    [
//        'id'    => 17,
//        'email' => 'test17@test.com',
//        'name'  => 'test17',
//        'phone' => '17'
//    ],
//    [
//        'id'    => 67,
//        'email' => 'test67@test.com',
//        'name'  => 'test67',
//        'phone' => '67'
//    ],
//    [
//        'id'    => 26,
//        'email' => 'test26@test.com',
//        'name'  => 'test26',
//        'phone' => '26'
//    ],
//    [
//        'id' => 1,
//        'email' => 'test1@test.com',
//        'name' => 'test1',
//        'phone' => '1',
//    ],
//    [
//        'id' => 2,
//        'email' => 'test2@test.com',
//        'name' => 'test2',
//        'phone' => '2',
//    ],
//    [
//        'id' => 3,
//        'email' => 'test3@test.com',
//        'name' => 'test3',
//        'phone' => '3',
//    ],
//    [
//        'id' => 4,
//        'email' => 'test4@test.com',
//        'name' => 'test4',
//        'phone' => '4',
//    ],
//    [
//        'id' => 5,
//        'email' => 'test5@test.com',
//        'name' => 'test5',
//        'phone' => '5',
//    ],
//    [
//        'id' => 6,
//        'email' => 'test6@test.com',
//        'name' => 'test6',
//        'phone' => '6',
//    ],
//    [
//        'id' => 7,
//        'email' => 'test7@test.com',
//        'name' => 'test7',
//        'phone' => '7',
//    ],
//    [
//        'id' => 8,
//        'email' => 'test8@test.com',
//        'name' => 'test8',
//        'phone' => '8',
//    ],
//    [
//        'id' => 9,
//        'email' => 'test9@test.com',
//        'name' => 'test9',
//        'phone' => '9',
//    ],
//    [
//        'id' => 10,
//        'email' => 'test10@test.com',
//        'name' => 'test10',
//        'phone' => '10',
//    ]
//];
//$colloborators = ['34', '17', '67', '26'];

//$colloboratorsUsers = [];
//foreach ($users as $user) {
//    if(in_array($user['id'], $colloborators)) {
//        $colloboratorsUsers[] = $user;
//    }
//}


//$users= array_filter($users, function ($user) {
//    global $colloborators;
//    return in_array($user['id'], $colloborators);
//});


//$array = [];
//$users= array_column($users, null, 'id');
//
//foreach ($colloborators as $id) {
//    if (true === isset($users[$id])) {
//        $array[] = $users[$id];
//    }
//}


//$words = ["apple", "banana", "cherry", "date", "elderberry"];
//function serchWords ($words, $symbol):array
//{
//    $new_words = [];
//    for($i = 0; $i < count($words); $i++)
//        if(str_starts_with($words[$i], $symbol))
//            $new_words[] = $words[$i];
//
//    return $new_words;
//}
//$words=serchWords($words, 'a');


//$items = ["apple", "banana", "apple", "cherry", "banana", "apple"];
//$rep=array_count_values($items);


//$words = ["apple", "banana", "cherry"];
//$lengthWords=[];
//foreach ($words as $word) {
//    $lengthWords[] = strlen($word);
//}

//$str="hello -> olleh";
//$array=str_split($str,strlen($str));