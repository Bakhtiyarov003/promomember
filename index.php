<?php
ob_start();
define('API_KEY','1143747045:AAFiw8MTbdAGuorbAlwHzaXaDEuT8S2xeGY');
//-----------------------------------------------------------------------------------------
// @Hacker_Qasoskorlar
function mahdi($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
//-----------------------------------------------------------------------------------------
// @FantasticFilmsHD
// msg
$Dev = array("1139073652","605778538","788709958"); 
$usernamebot = "PromoMembersBot"; 
$channel = "FantasticFilmsHD";  
$channelcode = "PromoMember"; 
$web = "https://lordmizban.ir/Mrbertbot"; 
$token = API_KEY;
//-----------------------------------------------------------------------------------------------
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
$textmassage = $message->text;
$firstname = $update->callback_query->from->first_name;
$usernames = $update->callback_query->from->username;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$membercall = $update->callback_query->id;
//------------------------------------------------------------------------
$data = $update->callback_query->data;
$messageid = $update->callback_query->message->message_id;
$tc = $update->message->chat->type;
$gpname = $update->callback_query->message->chat->title;
//------------------------------------------------------------------------
$forward_from = $update->message->forward_from;
$forward_from_id = $forward_from->id;
$forward_from_username = $forward_from->username;
$forward_from_first_name = $forward_from->first_name;
$reply = $update->message->reply_to_message->forward_from->id;
$reply_username = $update->message->reply_to_message->forward_from->username;
$reply_first = $update->message->reply_to_message->forward_from->first_name;
// ========================================================================
$forchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$channel."&user_id=".$from_id));
$tch = $forchannel->result->status;
$forchannelq = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$channel."&user_id=".$fromid));
$tchq = $forchannelq->result->status;
//=================================================================================================
//@FantasticFilmsHD:
function SendMessage($chat_id, $text){
mahdi('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDown']);
}
 function Forward($berekoja,$azchejaei,$kodompayam)
{
mahdi('ForwardMessage',[
'chat_id'=>$berekoja,
'from_chat_id'=>$azchejaei,
'message_id'=>$kodompayam
]);
}
function  getUserProfilePhotos($token,$from_id) {
  $url = 'https://api.telegram.org/bot'.$token.'/getUserProfilePhotos?user_id='.$from_id;
  $result = file_get_contents($url);
  $result = json_decode ($result);
  $result = $result->result;
  return $result;
}
function getChatMembersCount($chat_id,$token) {
  $url = 'https://api.telegram.org/bot'.$token.'/getChatMembersCount?chat_id=@'.$chat_id;
  $result = file_get_contents($url);
  $result = json_decode ($result);
  $result = $result->result;
  return $result;
}
function getChatstats($chat_id,$token) {
  $url = 'https://api.telegram.org/bot'.$token.'/getChatAdministrators?chat_id=@'.$chat_id;
  $result = file_get_contents($url);
  $result = json_decode ($result);
  $result = $result->ok;
  return $result;
}
//--------------------------------------------------------------
@$user = json_decode(file_get_contents("data/user.json"),true);
@$juser = json_decode(file_get_contents("data/$from_id.json"),true);
@$cuser = json_decode(file_get_contents("data/$fromid.json"),true);
//===================================================================
if(!in_array($from_id, $user["userlist"]) == true) {
$user["userlist"][]="$from_id";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
mkdir("start");
    }
//==================================================================
if(in_array($from_id, $user["blocklist"])) {
mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"⛔ | Siz bloklangansiz! Botni boshqa ishlata olmaysiz! Admin bilan bog‘laning!",
'reply_markup'=>json_encode(['KeyboardRemove'=>[
],'remove_keyboard'=>true
])
    		]);
}
if($textmassage=="/start" && $tc == "private"){	
if(in_array($from_id, $user["userlist"]) == true) {
mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👋🏻Salom, $first_name.
➖➖➖➖➖
🔹️Siz ushbu bot yordamida kanalingizga 100% aktiv o'zbek odamlarni qo‘sha olasiz!
➖➖➖➖➖
🔹️Quyidagi menyulardan birini tanlang.🔻",
   	'reply_markup'=>json_encode([
  	'inline_keyboard'=>[
    [
   ['text'=>"💸 | Ball to‘plash | 💸",'callback_data'=>'takecoin']
   ],
    [
   ['text'=>"🎯 | Kanal qo‘shish | 🎯",'callback_data'=>'takemember'],['text'=>"⚙️ | Profilim | ⚙",'callback_data'=>'accont']
   ],
   [
   ['text'=>"🔗 | Referal | 🔗",'callback_data'=>'member'],['text'=>"💰 | Ball sotib olish | 💰",'callback_data'=>'bycoin']
   ],
      [
   ['text'=>"📍 | Ball berish | 📍",'callback_data'=>'sendcoin'],['text'=>"💼 | Buyurtmalar | 💼",'callback_data'=>'suporder']
   ],
      [
   ['text'=>"🎓 | Admin | 🎓",'callback_data'=>'sup'],['text'=>"❗| Qoidalar | ❗",'callback_data'=>'help'],['text'=>"🗝️ | Promokod | 🗝",'callback_data'=>'code']
   ],
   ],
	  	'resize_keyboard'=>true,
  	])
  	]);
$juser["userfild"]["$from_id"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
else
{
mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👋🏻Salom, $first_name.
➖➖➖➖➖
🔹️Siz ushbu bot yordamida kanalingizga 100% aktiv o'zbek odamlarni qo‘sha olasiz!
➖➖➖➖➖
🔹️Quyidagi menyulardan birini tanlang.🔻",
   	'reply_markup'=>json_encode([
  	'inline_keyboard'=>[
    [
   ['text'=>"💸 | Ball to‘plash | 💸",'callback_data'=>'takecoin']
   ],
    [
   ['text'=>"🎯 | Kanal qo‘shish | 🎯",'callback_data'=>'takemember'],['text'=>"⚙️ | Profilim | ⚙",'callback_data'=>'accont']
   ],
   [
   ['text'=>"🔗 | Referal | 🔗",'callback_data'=>'member'],['text'=>"💰 | Ball sotib olish | 💰",'callback_data'=>'bycoin']
   ],
      [
   ['text'=>"📍 | Ball berish | 📍",'callback_data'=>'sendcoin'],['text'=>"💼 | Buyurtmalar | 💼",'callback_data'=>'suporder']
   ],
      [
   ['text'=>"🎓 | Admin | 🎓",'callback_data'=>'sup'],['text'=>"❗| Qoidalar | ❗",'callback_data'=>'help'],['text'=>"🗝️ | Promokod | 🗝",'callback_data'=>'code']
   ],
    ],
	  	'resize_keyboard'=>true,
  	])
  	]);
$juser = json_decode(file_get_contents("data/$from_id.json"),true);
$juser["userfild"]["$from_id"]["invite"]="0";
$juser["userfild"]["$from_id"]["coin"]="0";
$juser["userfild"]["$from_id"]["setchannel"]="Siz kanalga a'zo bo'lmadingiz!";
$juser["userfild"]["$from_id"]["setmember"]="Siz kanalga a'zo bo'lmadingiz!";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
}
elseif(strpos($textmassage , '/start ') !== false  ) {
$start = str_replace("/start ","",$textmassage);
if(in_array($from_id, $user["userlist"])) {
mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👋🏻Salom, $first_name.
➖➖➖➖➖
🔹️Siz ushbu bot yordamida kanalingizga 100% aktiv o'zbek odamlarni qo‘sha olasiz!
➖➖➖➖➖
🔹️Quyidagi menyulardan birini tanlang.🔻",
	   	'reply_markup'=>json_encode([
  	'inline_keyboard'=>[
    [
   ['text'=>"💸 | Ball to‘plash | 💸",'callback_data'=>'takecoin']
   ],
    [
   ['text'=>"🎯 | Kanal qo‘shish | 🎯",'callback_data'=>'takemember'],['text'=>"⚙️ | Profilim | ⚙",'callback_data'=>'accont']
   ],
   [
   ['text'=>"🔗 | Referal | 🔗",'callback_data'=>'member'],['text'=>"💰 | Ball sotib olish | 💰",'callback_data'=>'bycoin']
   ],
      [
   ['text'=>"📍 | Ball berish | 📍",'callback_data'=>'sendcoin'],['text'=>"💼 | Buyurtmalar | 💼",'callback_data'=>'suporder']
   ],
      [
   ['text'=>"🎓 | Admin | 🎓",'callback_data'=>'sup'],['text'=>"❗| Qoidalar | ❗",'callback_data'=>'help'],['text'=>"🗝️ | Promokod | 🗝",'callback_data'=>'code']
   ],
    ],
	  	'resize_keyboard'=>true,
  	])
  	]);
}
else
{
$juser = json_decode(file_get_contents("data/$from_id.json"),true);
$inuser = json_decode(file_get_contents("data/$start.json"),true);
$member = $inuser["userfild"]["$start"]["invite"];
$coin = $inuser["userfild"]["$start"]["coin"];
$memberplus = $member + 1;
$coinplus = $coin  + 5;
	mahdi('sendmessage',[
	'chat_id'=>$start,
	'text'=>"🎉Tabriklaymiz, sizning referal havolangiz orqali botga bir kishi kirdi va siz 5 ballga ega bo‘ldingiz.
➖➖➖➖➖
🔗 | Referallar: $memberplus
💰 | Balans: $coinplus",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙 ",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
 mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👋🏻Salom, $first_name.
➖➖➖➖➖
🔹️Siz ushbu bot yordamida kanalingizga 100% aktiv o'zbek odamlarni qo‘sha olasiz!
➖➖➖➖➖
🔹️Quyidagi menyulardan birini tanlang.🔻",
   	'reply_markup'=>json_encode([
  	'inline_keyboard'=>[
    [
   ['text'=>"💸 | Ball to‘plash | 💸",'callback_data'=>'takecoin']
   ],
    [
   ['text'=>"🎯 | Kanal qo‘shish | 🎯",'callback_data'=>'takemember'],['text'=>"⚙️ | Profilim | ⚙",'callback_data'=>'accont']
   ],
   [
   ['text'=>"🔗 | Referal | 🔗",'callback_data'=>'member'],['text'=>"💰 | Ball sotib olish | 💰",'callback_data'=>'bycoin']
   ],
      [
   ['text'=>"📍 | Ball berish | 📍",'callback_data'=>'sendcoin'],['text'=>"💼 | Buyurtmalar | 💼",'callback_data'=>'suporder']
   ],
      [
   ['text'=>"🎓 | Admin | 🎓",'callback_data'=>'sup'],['text'=>"❗| Qoidalar | ❗",'callback_data'=>'help'],['text'=>"🗝️ | Promokod | 🗝",'callback_data'=>'code']
   ],
    ],
	  	'resize_keyboard'=>true,
  	])
  	]);	
$inuser["userfild"]["$start"]["invite"]="$memberplus";
$inuser["userfild"]["$start"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$start.json",$inuser);
$juser["userfild"]["$from_id"]["invite"]="0";
$juser["userfild"]["$from_id"]["coin"]="0";
$juser["userfild"]["$from_id"]["setchannel"]="Siz kanalga a‘zo bo‘lmadingiz!";
$juser["userfild"]["$from_id"]["setmember"]="Siz kanalga a‘zo bo‘lmadingiz!";
$juser["userfild"]["$from_id"]["inviter"]="$start";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
}
elseif($cuser["userfild"]["$fromid"]["channeljoin"] == true){
$allchannel = $cuser["userfild"]["$fromid"]["channeljoin"];
for($z = 0;$z <= count($allchannel) -1;$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
break;
}
}
if($allchannel[$z] == true){
     mahdi('answercallbackquery', [
              'callback_query_id' =>$membercall,
            'text' => "❗ | Siz kanalni tark etdingiz @$allchannel[$z] va siz 10 ball jarima oldingiz",
            'show_alert' =>false
         ]);  
unset($cuser["userfild"]["$fromid"]["channeljoin"][$z]);
$cuser["userfild"]["$fromid"]["channeljoin"]=array_values($cuser["userfild"]["$fromid"]["channeljoin"]);  
$coin = $cuser["userfild"]["$fromid"]["coin"];
$pluscoin = $coin - 10;
$cuser["userfild"]["$fromid"]["coin"]="$pluscoin";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);      
}
}
if($data=="panel"){
mahdi('editmessagetext',[
        'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"🏠Siz bosh menyuga qaytdingiz.
➖➖➖➖➖
Kerakli bo'limni tanlang.🔻",
   	'reply_markup'=>json_encode([
  	'inline_keyboard'=>[
    [
   ['text'=>"💸 | Ball to‘plash | 💸",'callback_data'=>'takecoin']
   ],
    [
   ['text'=>"🎯 | Kanal qo‘shish | 🎯",'callback_data'=>'takemember'],['text'=>"⚙️ | Profilim | ⚙",'callback_data'=>'accont']
   ],
   [
   ['text'=>"🔗 | Referal | 🔗",'callback_data'=>'member'],['text'=>"💰 | Ball sotib olish | 💰",'callback_data'=>'bycoin']
   ],
      [
   ['text'=>"📍 | Ball berish | 📍",'callback_data'=>'sendcoin'],['text'=>"💼 | Buyurtmalar | 💼",'callback_data'=>'suporder']
   ],
      [
   ['text'=>"🎓 | Admin | 🎓",'callback_data'=>'sup'],['text'=>"❗| Qoidalar | ❗",'callback_data'=>'help'],['text'=>"🗝️ | Promokod | 🗝",'callback_data'=>'code']
   ],
    ],
	  	'resize_keyboard'=>true,
  	])
  	]);	
$cuser = json_decode(file_get_contents("data/$fromid.json"),true);
$cuser["userfild"]["$fromid"]["file"]="none";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
elseif($data=="takecoin" ){
$rules = $cuser["userfild"]["$fromid"]["acceptrules"];
if($rules == false){
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"
🛑 | STOP!
➖➖➖➖➖
❗| Avval qoidalarni yaxshilab o‘qib chiqing! Keyin esa Ball ishlang!
➖➖➖➖➖
1️⃣ | Avval bizning kanalga obuna bo‘ling! @FantasticFilms_HD
2️⃣ | Kanallarga qo‘shiling va ball to‘plang!
3️⃣ | Kanaldan chiqib ketsangiz 10 Ball jarima!
4️⃣ | Buyurtmachilar uchun: Botni kanalda VIP admin qiling!
➖➖➖➖➖
📌 | E'lon: BU YERDA REKLAMA JOYLASHINGIZ MUMKIN!
➖➖➖➖➖
💰 | Reklama joylash uchun adminga yozing: @FantasticFilmsSupport
➖➖➖➖➖
❗ | Qoidalar tugmasi orqali barcha vazifalarni to‘g‘ri bajaring!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"💸 | Ball to‘plash | 💸",'callback_data'=>"takecoin"],['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                   [
				   ['text'=>"❗| Qoidalar | ❗",'callback_data'=>'help']
				   ],
                     ]
               ])
	]);	
$cuser["userfild"]["$fromid"]["acceptrules"]="true";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
		   }
else
{
if($tchq != 'member' && $tchq != 'creator' && $tchq != 'administrator'){
$join = $cuser["userfild"]["$fromid"]["canceljoin"];
if($join == false){
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"📡 | Bizning kanalga a'zo bo‘ling!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"📡 | A‘zo bo‘lish",'url'=>"https://t.me/$channel"],['text'=>"✅️ | Tekshirish | ✅",'callback_data'=>'mainchannel']
				   ],
				   [
				   ['text'=>"💸 | Ball to‘plash | 💸",'callback_data'=>'takecoin'],['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
$cuser["userfild"]["$fromid"]["canceljoin"]="true";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);		   
}
else
{
$allchannel = $user["channellist"];
for($z = 0;$z <= count($allchannel);$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
break;
}
}
if ($allchannel[$z] == true){
$url = file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$allchannel[$z]");
$getchat = json_decode($url, true);
$name = $getchat["result"]["title"]; 
$username = $getchat["result"]["username"]; 
$id = $getchat["result"]["id"]; 
$description = $getchat["result"]["description"];
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"📄 | Ma'lumot
📡 | Kanal nomi: $name
🌐 | Kanal username:  @$username
🆔 | Kanal ID: $id
ℹ️ | Kanal info: $description
💸 | Kanalga obuna bo‘ling va botga qaytib tekshirish tugmasini bosing.
💰 | Ball miqdori: 5 Ball
🔺 | Kanaldan chiqib ketsangiz 10 Ball jarima beriladi!
❗ | Agarda kanal yomon kanal bo'lsa •⛔Yomon kanal• tugmasini bosing! Agar kanal rostdan ham yomon kanal bo'lsa sizga 10 Ball beriladi. Agar kanal yomon kanal bo‘lmasa sizdan 20 ball olib tashlanadi.",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"🎯 | A‘zo bo‘lish | 🎯",'url'=>"https://t.me/$username"],['text'=>"✅️ | Tekshirish | ✅",'callback_data'=>'truechannel']
				   ],
				   [
				   ['text'=>"🔜 | O'tkazib yuborish | 🔜",'callback_data'=>'nextchannel'],['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
				   				   [
				   ['text'=>"⛔ | Yomon kanal | ⛔",'callback_data'=>'badchannel']
				   ],
                     ]
               ])
			   ]);
$cuser["userfild"]["$fromid"]["getjoin"]="$username";
$cuser["userfild"]["$fromid"]["arraychannel"]="$z";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);	
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"⏳Hozircha yangi kanallar yo‘q! Keyinroq kelib ko‘ring!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"💸 | Ball to‘plash | 💸",'callback_data'=>'takecoin'],['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
}
}
}
else
{
$allchannel = $user["channellist"];
for($z = 0;$z <= count($allchannel);$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
break;
}
}
if ($allchannel[$z] == true){
$url = file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$allchannel[$z]");
$getchat = json_decode($url, true);
$name = $getchat["result"]["title"]; 
$username = $getchat["result"]["username"]; 
$id = $getchat["result"]["id"]; 
$description = $getchat["result"]["description"];
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"📄 | Ma'lumot
📡 | Kanal nomi: $name
🌐 | Kanal username:  @$username
🆔 | Kanal ID: $id
ℹ️ | Kanal info: $description
💸 | Kanalga obuna bo‘ling va botga qaytib tekshirish tugmasini bosing.
💰 | Ball miqdori: 5 Ball
🔺 | Kanaldan chiqib ketsangiz 10 Ball jarima beriladi!
❗ | Agarda kanal yomon kanal bo'lsa •⛔Yomon kanal• tugmasini bosing! Agar kanal rostdan ham yomon kanal bo'lsa sizga 10 Ball beriladi. Agar kanal yomon kanal bo‘lmasa sizdan 20 ball olib tashlanadi.",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"🎯 | A‘zo bo‘lish | 🎯",'url'=>"https://t.me/$username"],['text'=>"✅️ | Tekshirish | ✅",'callback_data'=>'truechannel']
				   ],
				   [
				   ['text'=>"🔜 | O'tkazib yuborish | 🔜",'callback_data'=>'nextchannel'],['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
				   				   [
				   ['text'=>"⛔ | Yomon kanal | ⛔",'callback_data'=>'badchannel']
				   ],
                     ]
               ])
			   ]);
$cuser["userfild"]["$fromid"]["getjoin"]="$username";
$cuser["userfild"]["$fromid"]["arraychannel"]="$z";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"⏳Hozircha yangi kanallar yo‘q! Keyinroq kelib ko‘ring!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                    [
				   ['text'=>"💸 | Ball to‘plash | 💸",'callback_data'=>'takecoin'],['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
}
}
}
}
elseif($data=="truechannel" ){
$getjoinchannel = $cuser["userfild"]["$fromid"]["getjoin"];
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$getjoinchannel."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
        mahdi('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "❗Siz kanalga a'zo bo‘lmadingiz!",
            'show_alert' =>true
        ]);
}
else
{
 mahdi('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "🎉 Tabriklaymiz! Siz kanalga obuna bo‘ldingiz va 5 ballga ega bo‘ldingiz!",
            'show_alert' =>false
				   ]);
$cuser = json_decode(file_get_contents("data/$fromid.json"),true);
$coin = $cuser["userfild"]["$fromid"]["coin"];
$arraychannel = $cuser["userfild"]["$fromid"]["arraychannel"];
$coinchannel = $user["setmemberlist"];
$channelincoin = $coinchannel[$arraychannel];
$downchannel = $channelincoin - 1;
$pluscoin = $coin + 5;
$cuser["userfild"]["$fromid"]["channeljoin"][]="$getjoinchannel";
$cuser["userfild"]["$fromid"]["coin"]="$pluscoin";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
if($downchannel > 0){
@$user = json_decode(file_get_contents("data/user.json"),true);
$user["setmemberlist"]["$arraychannel"]="$downchannel";
$user["setmemberlist"]=array_values($user["setmemberlist"]); 
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
@$user = json_decode(file_get_contents("data/user.json"),true);
$allchannel = $user["channellist"];
for($z = 0;$z <= count($allchannel);$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
break;
}
}
if ($allchannel[$z] == true){
$url = file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$allchannel[$z]");
$getchat = json_decode($url, true);
$name = $getchat["result"]["title"]; 
$username = $getchat["result"]["username"]; 
$id = $getchat["result"]["id"]; 
$description = $getchat["result"]["description"];
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"📄 | Ma'lumot
📡 | Kanal nomi: $name
🌐 | Kanal username:  @$username
🆔 | Kanal ID: $id
ℹ️ | Kanal info: $description
💸 | Kanalga obuna bo‘ling va botga qaytib tekshirish tugmasini bosing.
💰 | Ball miqdori: 5 Ball
🔺 | Kanaldan chiqib ketsangiz 10 Ball jarima beriladi!
❗ | Agarda kanal yomon kanal bo'lsa •⛔Yomon kanal• tugmasini bosing! Agar kanal rostdan ham yomon kanal bo'lsa sizga 10 Ball beriladi. Agar kanal yomon kanal bo‘lmasa sizdan 20 ball olib tashlanadi.",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				    ['text'=>"🎯 | A‘zo bo‘lish | 🎯",'url'=>"https://t.me/$username"],['text'=>"✅️ | Tekshirish | ✅",'callback_data'=>'truechannel']
				   ],
				   [
				   ['text'=>"🔜 | O'tkazib yuborish | 🔜",'callback_data'=>'nextchannel'],['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
				   				   [
				   ['text'=>"⛔ | Yomon kanal | ⛔",'callback_data'=>'badchannel']
				   ],
                     ]
               ])
			   ]);
$cuser = json_decode(file_get_contents("data/$fromid.json"),true);
$cuser["userfild"]["$fromid"]["getjoin"]="$username";
$cuser["userfild"]["$fromid"]["arraychannel"]="$z";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"⏳Hozircha kanallar yo‘q! Keyinroq kelib ko‘ring!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                    [
				   ['text'=>"💸 | Ball to‘plash | 💸",'callback_data'=>'takecoin'],['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
}
}
else
{
unset($user["setmemberlist"]["$arraychannel"]);
unset($user["channellist"]["$arraychannel"]);
$user["channellist"]=array_values($user["channellist"]); 
$user["setmemberlist"]=array_values($user["setmemberlist"]);  
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
@$user = json_decode(file_get_contents("data/user.json"),true);
$allchannel = $user["channellist"];
for($z = 0;$z <= count($allchannel);$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
break;
}
}
if ($allchannel[$z] == true){
$url = file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$allchannel[$z]");
$getchat = json_decode($url, true);
$name = $getchat["result"]["title"]; 
$username = $getchat["result"]["username"]; 
$id = $getchat["result"]["id"]; 
$description = $getchat["result"]["description"];
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"📄 | Ma'lumot
📡 | Kanal nomi: $name
🌐 | Kanal username:  @$username
🆔 | Kanal ID: $id
ℹ️ | Kanal info: $description
💸 | Kanalga obuna bo‘ling va botga qaytib tekshirish tugmasini bosing.
💰 | Ball miqdori: 5 Ball
🔺 | Kanaldan chiqib ketsangiz 10 Ball jarima beriladi!
❗ | Agarda kanal yomon kanal bo'lsa •⛔Yomon kanal• tugmasini bosing! Agar kanal rostdan ham yomon kanal bo'lsa sizga 10 Ball beriladi. Agar kanal yomon kanal bo‘lmasa sizdan 20 ball olib tashlanadi.",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				    ['text'=>"🎯 | A‘zo bo‘lish | 🎯",'url'=>"https://t.me/$username"],['text'=>"✅️ | Tekshirish | ✅",'callback_data'=>'truechannel']
				   ],
				   [
				   ['text'=>"🔜 | O'tkazib yuborish | 🔜",'callback_data'=>'nextchannel'],['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
				   				   [
				   ['text'=>"⛔ | Yomon kanal | ⛔",'callback_data'=>'badchannel']
				   ],
                     ]
               ])
			   ]);
$cuser = json_decode(file_get_contents("data/$fromid.json"),true);
$cuser["userfild"]["$fromid"]["getjoin"]="$username";
$cuser["userfild"]["$fromid"]["arraychannel"]="$z";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"⏳Yangi kanallar yo‘q! Keyinroq kelib ko‘ring!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                    [
				   ['text'=>"💸 | Ball to‘plash | 💸",'callback_data'=>'takecoin'],['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
}
}
}
}
elseif($data=="nextchannel" ){
 mahdi('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "⚜ O‘tkazib yuborildi...",
            'show_alert' =>false
        ]);
$arraychannel = $cuser["userfild"]["$fromid"]["arraychannel"];
$plusarraychannel = $arraychannel + 1 ;
$allchannel = $user["channellist"];
for($z = $plusarraychannel;$z <= count($allchannel);$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
break;
}
}
if ($allchannel[$z] == true){
$url = file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$allchannel[$z]");
$getchat = json_decode($url, true);
$name = $getchat["result"]["title"]; 
$username = $getchat["result"]["username"]; 
$id = $getchat["result"]["id"]; 
$description = $getchat["result"]["description"];
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"📄 | Ma'lumot
📡 | Kanal nomi: $name
🌐 | Kanal username:  @$username
🆔 | Kanal ID: $id
ℹ️ | Kanal info: $description
💸 | Kanalga obuna bo‘ling va botga qaytib tekshirish tugmasini bosing.
💰 | Ball miqdori: 5 Ball
🔺 | Kanaldan chiqib ketsangiz 10 Ball jarima beriladi!
❗ | Agarda kanal yomon kanal bo'lsa •⛔Yomon kanal• tugmasini bosing! Agar kanal rostdan ham yomon kanal bo'lsa sizga 10 Ball beriladi. Agar kanal yomon kanal bo‘lmasa sizdan 20 ball olib tashlanadi.",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				    ['text'=>"🎯 | A‘zo bo‘lish | 🎯",'url'=>"https://t.me/$username"],['text'=>"✅️ | Tekshirish | ✅",'callback_data'=>'truechannel']
				   ],
				   [
				   ['text'=>"🔜 | O'tkazib yuborish | 🔜",'callback_data'=>'nextchannel'],['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
				   				   [
				   ['text'=>"⛔ | Yomon kanal | ⛔",'callback_data'=>'badchannel']
				   ],
                     ]
               ])
			   ]);
$cuser["userfild"]["$fromid"]["getjoin"]="$username";
$cuser["userfild"]["$fromid"]["arraychannel"]="$z";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"⏳Yangi kanallar yo‘q! Keyinroq kelib ko‘ring!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                    [
				   ['text'=>"💸 | Ball to‘plash | 💸",'callback_data'=>'takecoin'],['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
}
}
elseif($data=="mainchannel" ){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$channel."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
        mahdi('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "❗Siz kanalga a'zo bo‘lmadingiz!",
            'show_alert' =>true
        ]);
}
else
{
 mahdi('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "🎉 Tabriklaymiz sizga 5 Ball berildi!",
            'show_alert' =>false
        ]);
$coin = $cuser["userfild"]["$fromid"]["coin"];
$pluscoin = $coin + 5;
$cuser["userfild"]["$fromid"]["coin"]="$pluscoin";
$cuser["userfild"]["$fromid"]["channeljoin"][]="$channel";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
@$user = json_decode(file_get_contents("data/user.json"),true);
$allchannel = $user["channellist"];
for($z = 0;$z <= count($allchannel);$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
$omm = $allchannel[$z];
break;
}
}
if ($allchannel[$z] == true){
$url = file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$allchannel[$z]");
$getchat = json_decode($url, true);
$name = $getchat["result"]["title"]; 
$username = $getchat["result"]["username"]; 
$id = $getchat["result"]["id"]; 
$description = $getchat["result"]["description"];
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"📄 | Ma'lumot
📡 | Kanal nomi: $name
🌐 | Kanal username:  @$username
🆔 | Kanal ID: $id
ℹ️ | Kanal info: $description
💸 | Kanalga obuna bo‘ling va botga qaytib tekshirish tugmasini bosing.
💰 | Ball miqdori: 5 Ball
🔺 | Kanaldan chiqib ketsangiz 10 Ball jarima beriladi!
❗ | Agarda kanal yomon kanal bo'lsa •⛔Yomon kanal• tugmasini bosing! Agar kanal rostdan ham yomon kanal bo'lsa sizga 10 Ball beriladi. Agar kanal yomon kanal bo‘lmasa sizdan 20 ball olib tashlanadi.",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				    ['text'=>"🎯 | A‘zo bo‘lish | 🎯",'url'=>"https://t.me/$username"],['text'=>"✅️ | Tekshirish | ✅",'callback_data'=>'truechannel']
				   ],
				   [
				   ['text'=>"🔜 | O'tkazib yuborish | 🔜",'callback_data'=>'nextchannel'],['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
				   				   [
				   ['text'=>"⛔ | Yomon kanal | ⛔",'callback_data'=>'badchannel']
				   ],
                     ]
               ])
			   ]);
$cuser = json_decode(file_get_contents("data/$fromid.json"),true);
$cuser["userfild"]["$fromid"]["getjoin"]="$username";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"⏳Yangi kanallar yo‘q! Keyinroq kelib ko‘ring!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                    [
				   ['text'=>"💸 | Ball to‘plash | 💸",'callback_data'=>'takecoin'],['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
}
}
}
elseif($data=="badchannel"){
$getjoinchannel = $cuser["userfild"]["$fromid"]["getjoin"];
	 mahdi('answercallbackquery', [
	            'callback_query_id' =>$membercall,
            'text' => "📌Shikoyatingiz adminga yetkazildi. Agar ushbu kanal rostdan ham yomon kanal bo'lsa sizga 10 ball beriladi. Agar kanal yomon kanal bo'lmasa sizdan 20 ball olib tashlanadi. 🍁Yangiliklar: @FantasticFilms_HD",
            'show_alert' =>true
        ]);
	mahdi('sendmessage',[
	'chat_id'=>$Dev[0],
	'text'=>"❗ @$getjoinchannel kanali yomon kanal deb topildi.
➖➖➖➖➖
📃Foydalanuvchi haqida ma'lumot:
➖➖➖➖➖
🆔 ID: $fromid
♦️Foydalanuvchi: @ $usernames",
  	]);
}
elseif($data=="accont"){
$invite = $cuser["userfild"]["$fromid"]["invite"];
$coin = $cuser["userfild"]["$fromid"]["coin"];
$setchannel = $cuser["userfild"]["$fromid"]["setchannel"];
$setmember = $cuser["userfild"]["$fromid"]["setmember"];
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"🎯 | Siz haqingizdagi ma'lumotlar:
➖➖➖➖➖
💰 | Balllar soni: $coin
🔗 | Taklif qilingan do‘stlaringiz soni: $invite
📌 | Sizning ismingiz: $firstname
🌐 | Sizning useringiz: @$usernames
🆔 | Sizning ID manzilingiz: $fromid",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"📌 | Obunalar",'callback_data'=>'mechannel'],['text'=>"📣 | Mening kanalim",'callback_data'=>'order']
				   ],
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
}
elseif($data=="mechannel"){
$allchannel = $cuser["userfild"]["$fromid"]["channeljoin"];
for($z = 0;$z <= count($allchannel)-1;$z++){
$result = $at.$result."📍 "."@".$allchannel[$z]."\n";
}
if($result == true){
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"📍 | Siz obuna bo‘lgan kanallar:🔻
➖➖➖➖➖
$result
➖➖➖➖➖
❗ | Kanallardan chiqib ketsangiz 5 Ball jarima.",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);		
}	
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"❗Siz kanal qo‘shmagansiz!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel'],['text'=>"💸 | Ball to'plash | 💸",'callback_data'=>'takecoin']
				   ],
				   ]
            ])           
  	]);		
}
}
elseif($data=="order"){
$allchannel = $cuser["userfild"]["$fromid"]["listorder"];
for($z = 0;$z <= count($allchannel)-1;$z++){
$result = $at.$result."📍 ".$allchannel[$z]." Obunachilar"."\n";
}
if($result == true){
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🎯 | Sizning buyurtmalaringiz:🔻
➖➖➖➖➖
$result",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);		
}
else
{
$coin = $cuser["userfild"]["$fromid"]["coin"];
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"❗ | Siz buyurtmalar qilmagansiz!
➖➖➖➖➖
📍 | Agar sizda 50 balldan ko‘p ball bo‘lsa buyurtma bering!
➖➖➖➖➖
📍 | Sizning balansingiz: $coin",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel'],['text'=>"📣 | Buyurtma berish | 📣",'callback_data'=>'takemember']
				   ],
				   ]
            ])           
  	]);
}
}
elseif($data=="member"){
$invite = $cuser["userfild"]["$fromid"]["invite"];
$coin = $cuser["userfild"]["$fromid"]["coin"];
		mahdi('sendphoto‘,[
	'chat_id'=>$chatid,
	'photo‘=>new CURLFile("other/pic.jpg"),
	'caption'=>"📌 | Do‘stlaringizni taklif qiling! 
➖➖➖➖➖
📍 | Har bir do‘stingiz uchun 5 ballga ega bo‘ling.
➖➖➖➖➖
🔗 | Sizning referal manzilingiz:🔻
➖➖➖➖➖
🔥 https://t.me/$usernamebot?start=$fromid 🔥",
    		]);
	mahdi('sendmessage',[
	'chat_id'=>$chatid,
'text'=>"📌 | Do‘stlaringizni taklif qiling! 
➖➖➖➖➖
📍 | Har bir do‘stingiz uchun 5 ballga ega bo‘ling.
➖➖➖➖➖
🔗 | Sizning referal manzilingiz:🔻
➖➖➖➖➖
🔥 https://t.me/$usernamebot?start=$fromid 🔥
➖➖➖➖➖
💸 | Balans: $coin ball
🔗 | Referallar: $invite
➖➖➖➖➖
 Agar do‘stingiz Ball sotib olsa siz 20% bonus olasiz!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);			
}
elseif($data=="sendcoin"){	

mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"📍 | Balllarni do‘stingizga o‘tkazish uchun do‘stingiz ID manzilini menga yuboring!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);	
$cuser["userfild"]["$fromid"]["file"]="sendcoin";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);		
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'sendcoin') {
$coin = $juser["userfild"]["$from_id"]["coin"];
if($forward_from == true){
if($forward_from_id != $from_id){
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"🔍 | Do‘stingiz topildi.
➖➖➖➖➖
📌 | U haqida ma'lumot:🔻
➖➖➖➖➖
📍 | Ism: $forward_from_first_name
🌐 | Username: @$forward_from_username
🆔 | ID: $forward_from_id
➖➖➖➖➖
🉐 | Yuboriladigan Ball sonini menga yuboring!
💰 | Balllaringiz soni: $coin",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
$juser["userfild"]["$from_id"]["file"]="setsendcoin";
$juser["userfild"]["$from_id"]["sendcoinid"]="$forward_from_id";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
	mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"❗Siz Ballni o‘zingizga o‘zingiz yubora olmaysiz!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
}
}
else
{
if($textmassage != $from_id){
if(is_numeric($textmassage)){
$stat = file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$textmassage&user_id=".$textmassage);
$statjson = json_decode($stat, true);
$status = $statjson['ok'];
if($status == 1){
$name = $statjson['result']['user']['first_name'];
$username = $statjson['result']['user']['username'];
$id = $statjson['result']['user']['id'];
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"🔍 | Do‘stingiz topildi.
➖➖➖➖➖
📌 | U haqida ma'lumot:🔻
➖➖➖➖➖
📍 | Ism: $forward_from_first_name
🌐 | Username: @$forward_from_username
🆔 | ID: $forward_from_id
➖➖➖➖➖
🉐 | Yuboriladigan Ball sonini menga yuboring!
💰 | Balllaringiz soni: $coin",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
$juser["userfild"]["$from_id"]["file"]="setsendcoin";
$juser["userfild"]["$from_id"]["sendcoinid"]="$textmassage";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"❗Foydalanuvchi bot a‘zosi emas!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
}
}
else
{
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"❗Bunday ID telegramda mavjud emas!
            Iltimos e'tibor berib yozing!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
}
}
else
{
	mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"❗Siz Ballni o‘zingizga o‘zingiz yubora olmaysiz!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);	
}
}
}	
elseif($juser["userfild"]["$from_id"]["file"] == "setsendcoin"){
$coin = $juser["userfild"]["$from_id"]["coin"];
$userid = $juser["userfild"]["$from_id"]["sendcoinid"];
$inuser = json_decode(file_get_contents("data/$userid.json"),true);
$coinuser = $inuser["userfild"]["$userid"]["coin"];
if($textmassage <= $coin && $coin > 0){
$coinplus = $coin - $textmassage;
$sendcoinplus = $coinuser + $textmassage;
	mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"✅️ | Balllar o‘tkazildi!
➖➖➖➖➖
 📍 | O‘tkazish haqida ma'lumot:
 🆔 | ID: $userid
 ♾ | O‘tkazilgan Balllar soni: $textmassage
 💰 | Qolgan Balllar soni: $coinplus",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);	
		mahdi('sendmessage',[
	'chat_id'=>$userid,
	'text'=>"💰 | Sizga do‘stingiz $textmassage Ball yubordi!
➖➖➖➖➖
📍 | Do‘stingiz haqida ma'lumot:
🆔 | ID: $from_id
🌐 | Username: @$username",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);	
$juser["userfild"]["$from_id"]["file"]="none";
$juser["userfild"]["$from_id"]["coin"]="$coinplus";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
$inuser["userfild"]["$userid"]["coin"]="$sendcoinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$userid.json",$inuser);	
}
else
{
	mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"📍 | Sizda transfer uchun Balllar yetmaydi!
➖➖➖➖➖
📌 | Balllaringiz soni  : $coin",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);	
}
}
elseif($data=="suporder"){
$allchannel = $cuser["userfild"]["$fromid"]["listorder"];
for($z = 0;$z <= count($allchannel)-1;$z++){
$result = $at.$result."📍 ".$allchannel[$z]." Yakunlanmagan!"."\n";
}
if($result == true){
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"📍 | Buyurtma berish uchun kanalingiz userini yuboring!
➖➖➖➖➖
📌 | Quyidagicha yozing:
📍 | Masalan:  @HorrorFilms_HD
➖➖➖➖➖➖
⚔️ | Sizning buyurtmalaringiz :$result",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
$cuser["userfild"]["$fromid"]["file"]="setorder";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"❌ | Siz obunachilarga buyurtma bermadingiz!
               Buyurtma berish narxi:
               1 a'zo = 1 ball",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel'],['text'=>"💼 Buyurtma",'callback_data'=>'takemember']
				   ],
                     ]
               ])
			   ]);	
}
}
elseif($juser["userfild"]["$from_id"]["file"] == "setorder"){
$searchchannel = array_search($textmassage,$user["channellist"]);
$setmember = $user["setmemberlist"][$searchchannel];
if(preg_match('/^(@)(.*)/s',$textmassage)){
if($searchchannel == true){
	mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"💼 | Buyurtmangiz haqida ma'lumot:
➖➖➖➖➖
📣 | Kanalingiz: $textmassage
👣 | Buyurtma qilingan obunachilar soni: $setmember
➖➖➖➖➖
❗ | Agarda savollar bo‘lsa adminga yozing biz 48 soat ichida javob yozamiz!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);	
}
else
{
	mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"✅️ Sizning buyurtmangiz bajarildi! ",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);		
}
}
else
{
		mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"❗Bunday kanal yo‘q!
Quyidagicha yozing:🔻
Masalan: @$channel",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);	
}
}
elseif($data=="takemember"){
$coin = $cuser["userfild"]["$fromid"]["coin"];
if($coin >= 50){
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"🔹Kanalingiz userini menga yuboring va obunachilarga ega bo‘ling!
➕ Masalan : @$channel",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
$cuser["userfild"]["$fromid"]["file"]="setchannel";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"✖️Ballar juda kam!
               ❗Buyurtma berish uchun eng kamida 50 ball bo‘lishi zarur!
➖➖➖
 Balllar soni : $coin",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel'],['text'=>"💸 | Ball to'plash | 💸",'callback_data'=>'takecoin']
				   ],
                     ]
               ])
			   ]);
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'setchannel') {
if(preg_match('/^(@)(.*)/s',$textmassage)){
$coin = $juser["userfild"]["$from_id"]["coin"];
$max = $coin / 1;
$maxmember = floor($max);
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"✅️ | Qabul qilindi!
➖➖➖➖➖
👥 | Kanaldagi obunachilar: $textmassage
➖➖➖➖➖
❓ | Qancha obunachiga ega bo‘lmoqchisiz?
❗ | Siz hozir maksimum $maxmember obunachiga buyurtma bera olasiz!
1 A'zo = 1 Ball
Balans: $coin
Quyidagicha yozing:
➕ Masalan: 110",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
$juser["userfild"]["$from_id"]["file"]="setmember";
$juser["userfild"]["$from_id"]["setchannel"]="$textmassage";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
	mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"❗ | Noto‘g‘ri!
🔻 | Quyidagicha yozing:
➕ | Masalan @$channel",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'setmember') {
$coin = $juser["userfild"]["$from_id"]["coin"];
$setchannel = $juser["userfild"]["$from_id"]["setchannel"];
$max = $coin / 1;
$maxmember = floor($max);
if($maxmember >= $textmassage){
$howmember = getChatMembersCount($setchannel,$token);$endmember = $howmember + $textmassage;
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📄 | Buyurtma haqida ma'lumot:
➖➖➖➖➖
 📡 | Kanal: $setchannel
 👣 | Buyurtma qilingan obunachilar soni: $textmassage
 👥 | Hozirgi obunachilar soni: $howmember
 👑 | Buyurtmadan so‘ng bo‘ladigan obunachilar soni: $endmember
➖➖➖➖➖
 ♾ | Barchasi to‘g‘ri bo‘lsa botni kanalingizga VIP admin qiling!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"✅️ | Tayyor | ✅",'callback_data'=>'trueorder']
				   ],
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel'],['text'=>"❗| Qoidalar | ❗",'callback_data'=>'help']
				   ],
                     ]
               ])
 ]);
$juser["userfild"]["$from_id"]["file"]="none";
$juser["userfild"]["$from_id"]["setmember"]="$textmassage";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
else
{
	mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"Sizning balansingizdan kelib chiqib maksimum $maxmember obunachi buyurtma bera olasiz!
 Masalan: 110",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
}
}
elseif($data=="trueorder"){
$setchannel = $cuser["userfild"]["$fromid"]["setchannel"];
$admin = getChatstats(@$setchannel,$token);
if($admin != true){
	       mahdi('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "❗ | Botni kanalingizga VIP admin qiling!",
            'show_alert' =>true
        ]);
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"✅️ | Sizning buyurtmangiz qabul qilindi!
➖➖➖➖➖
❗ | E'tibor bering: Siz botni kanalingiz adminligidan olib tashlasangiz buyurtmangiz bekor qilinadi! Siz va kanalingiz esa bloklanadi!
❗ | Eslatma: Agar, siz buyurtma bajarilmasdan avval boshqa telegram profilingizda yana shu kanalni buyurtma qilsangiz siz va kanalingiz bloklanadi!
➖➖➖➖➖
📍 | Batafsil bilib olish uchun
⚠️ | Qoidalar tugmasini bosing!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel'],['text'=>"❗ | Qoidalar | ❗",'callback_data'=>'help']
				   ],
                     ]
               ])
			   ]);	
$coin = $cuser["userfild"]["$fromid"]["coin"];
$setchannel = $cuser["userfild"]["$fromid"]["setchannel"];
$setmember = $cuser["userfild"]["$fromid"]["setmember"];
$pluscoin = $setmember * 1;
$coinplus = $coin - $pluscoin;
$cuser["userfild"]["$fromid"]["coin"]="$coinplus";
$cuser["userfild"]["$fromid"]["listorder"][]="$setchannel -> $setmember";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
$user["channellist"][]="$setchannel";
$user["setmemberlist"][]="$setmember";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
}
}
elseif($data=="bycoin"){
		mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"💰Ball sotib olmoqchi bo‘lsangiz adminga xabar bering!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"♾ | ADMIN | ♾",'url'=>"t.me/FantasticFilmsSupport"]
				   ],
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
}
elseif($data=="help"){
		mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"📍 | Qoidalar bo‘limiga xush kelibsiz!
➖➖➖➖➖
📍 | Kerakli bo‘limni tanlang:",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"📍 | Qoidalar | 📍",'callback_data'=>'rules'],['text'=>"📍 | Balllar va obunachilar | 📍",'callback_data'=>'coinandmember']
				   ],
				   				   				   [
['text'=>"📍 | Ko‘p beriladigan savollar | 📍",'callback_data'=>'qu'],['text'=>"📍 | Botni nima uchun admin qilamiz? | 📍",'callback_data'=>'whyadmin']
				   ],
				   			   				   				   [
['text'=>"📍 | Bot haqida | 📍",'callback_data'=>'about'],['text'=>"📍 | Botdan foydalanish | 📍",'callback_data'=>'howuser']
				   ],
				   			   				   				   [
['text'=>"📍 | Botni qanday admin qilamiz? | 📍",'callback_data'=>'howadmin']
				   ],
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
}
elseif($data=="rules"){
		mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"ℹ️  | Botning buyruq va shartlari:
➖➖➖➖➖
1⃣ | Agar siz robotga noma'qul bir kanalni ro‘yxatdan o‘tkazsangiz, sizning buyurtmangiz ham bot tomonidan bloklanadi!
➖➖➖➖➖
2⃣ | Agar siz bir necha marta xabar yuborib, botga spam yuborsangiz robotdan blok qilinasiz!
➖➖➖➖➖
3⃣ | Buyurtmani bajarish uchun  + bo‘lishiga robot javobgar emas.
➖➖➖➖➖
4⃣ | Agar ballar noto‘g‘ri tarnsfer qilingan bo‘lsa, admin hech qanday javobgarlikni o‘z zimmasiga olmaydi, shuning uchun ball transferida ehtiyot bo‘ling.
➖➖➖➖➖
5⃣ | Ulangan ball to‘liq avtomatlashtirilsa, biror bir muammoga duch kelsangiz adminga murojaat qiling.",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"📍 | Qoidalar | 📍",'callback_data'=>'rules'],['text'=>"📍 | Balllar va obunachilar | 📍",'callback_data'=>'coinandmember']
				   ],
				   				   				   [
['text'=>"📍 | Ko‘p beriladigan savollar | 📍",'callback_data'=>'qu'],['text'=>"📍 | Botni nima uchun admin qilamiz? | 📍",'callback_data'=>'whyadmin']
				   ],
				   			   				   				   [
['text'=>"📍 | Bot haqida | 📍",'callback_data'=>'about'],['text'=>"📍 | Botdan foydalanish | 📍",'callback_data'=>'howuser']
				   ],
				   			   				   				   [
['text'=>"📍 | Botni qanday admin qilamiz? | 📍",'callback_data'=>'howadmin']
				   ],
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
}
elseif($data=="coinandmember"){
		mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"ℹ️ | Balllar va obunachilar:
➖➖➖➖➖
1⃣ | Har bir kanalga obuna bo‘lish orqali Ball olasiz.
2️⃣ | Siz qo‘shilgan kanaldan chiqib ketsangiz -10 ball yo‘qotasiz.
3⃣ | Har bir a'zoni kanalingizga qo‘shish uchun 1 ball to‘lashingiz kerak",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"📍 | Qoidalar | 📍",'callback_data'=>'rules'],['text'=>"📍 | Balllar va obunachilar | 📍",'callback_data'=>'coinandmember']
				   ],
				   				   				   [
['text'=>"📍 | Ko‘p beriladigan savollar | 📍",'callback_data'=>'qu'],['text'=>"📍 | Botni nima uchun admin qilamiz? | 📍",'callback_data'=>'whyadmin']
				   ],
				   			   				   				   [
['text'=>"📍 | Bot haqida | 📍",'callback_data'=>'about'],['text'=>"📍 | Botdan foydalanish | 📍",'callback_data'=>'howuser']
				   ],
				   			   				   				   [
['text'=>"📍 | Botni qanday admin qilamiz? | 📍",'callback_data'=>'howadmin']
				   ],
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
}
elseif($data=="qu"){
		mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"ℹ️ | Ko'p beriladigan asosiy savollarga javoblar:🔻
➖➖➖➖➖
❓| Buyurtmani qancha muddat ichida bajarasiz?
❗️| Bot foydalanuvchilari qanchalik ko‘p bo‘lsa shunchalik buyurtma to‘ldirilishi tezlashadi shu tufayli buyurtma qanchada to‘ldirilishiga aniq muddat qo‘ya olmaymiz! Chunki bu foydalanuvchilar aktiv o‘zbeklar bo‘ladi!
➖➖➖➖➖
❓| Ball qanday sotib olsam bo‘ladi?
❗️| Agar ball sotib olmoqchi bo‘lsangiz admin bilan bo‘g‘lanishingiz zarur!
➖➖➖➖➖
❓| Balllarimni do'stimga topshirsam boladimi?
❗️| Ha, faqat u odamni so‘zini •Forward• qilib yoki •ID• manzilini yuborish orqali amalga oshirilishi mumkin.",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"📍 | Qoidalar | 📍",'callback_data'=>'rules'],['text'=>"📍 | Balllar va obunachilar | 📍",'callback_data'=>'coinandmember']
				   ],
				   				   				   [
['text'=>"📍 | Ko‘p beriladigan savollar | 📍",'callback_data'=>'qu'],['text'=>"📍 | Botni nima uchun admin qilamiz? | 📍",'callback_data'=>'whyadmin']
				   ],
				   			   				   				   [
['text'=>"📍 | Bot haqida | 📍",'callback_data'=>'about'],['text'=>"📍 | Botdan foydalanish | 📍",'callback_data'=>'howuser']
				   ],
				   			   				   				   [
['text'=>"📍 | Botni qanday admin qilamiz? | 📍",'callback_data'=>'howadmin']
				   ],
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
}
elseif($data=="whyadmin"){
		mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"ℹ️ | Nimaga botni adminlar qatoriga o‘rnatish kerak?
➖➖➖➖➖
📍| Sizning kanalingizdagi boshqaruvchingiz kanali a'zolaringiz ro‘yxatini ko‘rish va Ball olishni yoki Ball pasayishini hisoblash uchun administrator bo‘lishi kerak.
➖➖➖➖➖
❗️| Agar siz botni olib tashlasangiz, bot buyurtmani bekor qiladi va hisobingiz bloklanadi",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"📍 | Qoidalar | 📍",'callback_data'=>'rules'],['text'=>"📍 | Balllar va obunachilar | 📍",'callback_data'=>'coinandmember']
				   ],
				   				   				   [
['text'=>"📍 | Ko‘p beriladigan savollar | 📍",'callback_data'=>'qu'],['text'=>"📍 | Botni nima uchun admin qilamiz? | 📍",'callback_data'=>'whyadmin']
				   ],
				   			   				   				   [
['text'=>"📍 | Bot haqida | 📍",'callback_data'=>'about'],['text'=>"📍 | Botdan foydalanish | 📍",'callback_data'=>'howuser']
				   ],
				   			   				   				   [
['text'=>"📍 | Botni qanday admin qilamiz? | 📍",'callback_data'=>'howadmin']
				   ],
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
}
elseif($data=="howadmin"){
		mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"ℹ️ | Botni adminstrator qilish haqida ko'rsatma:🔻
➖➖➖➖➖
1️⃣ | Datlab kanal sozlamalarini bosing.
2️⃣ | Keyin adminstratorlar qatori bo'limiga kiring.
3️⃣ | Keyin adminstratorlar qo‘shish belgisini bosing!
4️⃣ | Keyin qidiruvni bosing va bot manzilini kiriting [@$usernamebot].
5️⃣ | Keyin robotimiz ustiga bosing hamma funksiyalarni bajarishiga ruxsat berib robotimizni •VIP Adminstrator• etib tayinlang!
➖➖➖➖➖
🍁Yangiliklar: @PromoMember",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"📍 | Qoidalar | 📍",'callback_data'=>'rules'],['text'=>"📍 | Balllar va obunachilar | 📍",'callback_data'=>'coinandmember']
				   ],
				   				   				   [
['text'=>"📍 | Ko‘p beriladigan savollar | 📍",'callback_data'=>'qu'],['text'=>"📍 | Botni nima uchun admin qilamiz? | 📍",'callback_data'=>'whyadmin']
				   ],
				   			   				   				   [
['text'=>"📍 | Bot haqida | 📍",'callback_data'=>'about'],['text'=>"📍 | Botdan foydalanish | 📍",'callback_data'=>'howuser']
				   ],
				   			   				   				   [
['text'=>"📍 | Botni qanday admin qilamiz? | 📍",'callback_data'=>'howadmin']
				   ],
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
}
elseif($data=="about"){
		mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"Bu bot sizning kanalingizga 100% o‘zbek obunachilarni taqdim etadi!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"📍 | Qoidalar | 📍",'callback_data'=>'rules'],['text'=>"📍 | Balllar va obunachilar | 📍",'callback_data'=>'coinandmember']
				   ],
				   				   				   [
['text'=>"📍 | Ko‘p beriladigan savollar | 📍",'callback_data'=>'qu'],['text'=>"📍 | Botni nima uchun admin qilamiz? | 📍",'callback_data'=>'whyadmin']
				   ],
				   			   				   				   [
['text'=>"📍 | Bot haqida | 📍",'callback_data'=>'about'],['text'=>"📍 | Botdan foydalanish | 📍",'callback_data'=>'howuser']
				   ],
				   			   				   				   [
['text'=>"📍 | Botni qanday admin qilamiz? | 📍",'callback_data'=>'howadmin']
				   ],
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
}
elseif($data=="howuser"){
		mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"📍 | Ushbu botdan qanday foydalanishni bilib oling:
➖➖➖➖➖
1️⃣ | Ball olish
📍 | Balllarni to‘plash uchun asosiy bot menyusidagi Ball ishlash tugmasidan foydalaning. Har bir kanaldan keyin botga qaytib, Tekshirish tugmasidan foydalaning.
📍 | Agar muammo yuzaga kelsa va a'nanaviy bo‘lmagan kanal yoki kanallar obuna bo‘lsa va Ball olmasangiz, hisobot tugmasini bosing va keyingi tugmani bosing.
➖➖➖➖➖
2️⃣ | Ro‘yxatdan o‘tish
📍 | Ballni qabul qilib taqsimlangandan so‘ng, sizning kanalingizga a'zolarni buyurtma qilish vaqti keladi. Sizning a'zolaringizni qabul qilish uchun kamida 10 ta Ball bo‘lishi kerak.
📍 | Buyurtma qilingan kanaldagi bot to‘g‘ri ishlashi uchun administrator bo‘lishi kerak, agar bot o‘chirilsa, buyurtma bekor qilinadi.
📍 | Buyurtma beriladigan kanal umumiy kanal bo‘lishi kerak
➖➖➖➖➖
3️⃣ | Referal
📍 | Do‘stlaringizni botga o‘zingizning maxsus havolangiz bilan taklif qilish orqali Balllarni olishingiz mumkin
📍 | Siz taklif qilgan do‘stlaringiz tomonidan Ball sotib olinsa, sotib olgan Balllarining 20% miqdori sizga qo‘shib beriladi.
➖➖➖➖➖
4️⃣ | Bepul balllar:
📍 | Agar siz botga kirgan birinchi shaxs bo‘lsangiz, Promokod qiymatini olishingiz mumkin bo‘ladi.
📍 | Ball kodi @$channelcode kanalida joylashtirilgan va har bir ball kodining qiymati administrator tomonidan o‘rnatiladi.",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"📍 | Qoidalar | 📍",'callback_data'=>'rules'],['text'=>"📍 | Balllar va obunachilar | 📍",'callback_data'=>'coinandmember']
				   ],
				   				   				   [
['text'=>"📍 | Ko‘p beriladigan savollar | 📍",'callback_data'=>'qu'],['text'=>"📍 | Botni nima uchun admin qilamiz? | 📍",'callback_data'=>'whyadmin']
				   ],
				   			   				   				   [
['text'=>"📍 | Bot haqida | 📍",'callback_data'=>'about'],['text'=>"📍 | Botdan foydalanish | 📍",'callback_data'=>'howuser']
				   ],
				   			   				   				   [
['text'=>"📍 | Botni qanday admin qilamiz? | 📍",'callback_data'=>'howadmin']
				   ],
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
}
elseif($data=="code"){
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"👋🏻 | Promokod bo‘limiga xush kelibsiz!
➖➖➖➖➖
🎯 | Menga @$channelcode kanaliga yuborilgan Promokodni yuboring!
➖➖➖➖➖
📌 | Agar siz birinchi bo‘lib menga kodni yuborsangiz bepul balllar olasiz!
➖➖➖➖➖
📣 | Barcha ma'lumotlar: Qoidalar bolimida!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel'],['text'=>"❗ | Qoidalar | ❗",'callback_data'=>'help']
				   ],
                     ]
               ])
			   ]);	
$cuser["userfild"]["$fromid"]["file"]="takecodecoin";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'takecodecoin') {
$code = $user["codecoin"];
if ($textmassage == $code) {
$coincode = $user["howcoincode"];
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"🎉 | Tabriklayman!
➖➖➖➖➖
📍 | Siz $coincode Ball yutib oldingiz!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
          mahdi('sendmessage',[
        	'chat_id'=>"@$channelcode",
        	'text'=>"📌 Promokod ishlatildi!📌
➖➖➖➖➖
📍 | Nik :  $first_name           
➖➖➖➖➖  ᅠ
🆔 | ID : $from_id
➖➖➖➖➖
🤖 | Bot: @$usernamebot
➖➖➖➖➖
❗Endi bu koddan boshqa foydalanib bo'lmaydi.",
 ]);
unset($user["codecoin"]);
unset($user["howcoincode"]);
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
$coin = $juser["userfild"]["$from_id"]["coin"];
$coinplus = $coin + $coincode;
$juser["userfild"]["$from_id"]["coin"]="$coinplus";
$juser["userfild"]["$fromid"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
else
{
	mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"❗| Kod notog`ri yoki uni sizdan avval ishlatib bo‘lishgan!
➖➖➖➖➖
📌 | @$channelcode kanalini doimo kuzatib boring va birinchi bo‘lib kodni yuboring va Balllar oling!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
}
}
elseif($data=="sup"){
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"⁉️Savollar bo‘lsa yozib qoldiring biz tez orada javob berishga harakat qilamiz!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
$cuser["userfild"]["$fromid"]["file"]="sendsup";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);	
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'sendsup') {
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"✅️Xabar yuborildi javobni kuting!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
mahdi('ForwardMessage',[
'chat_id'=>$Dev[0],
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);
}
	elseif($update->message && $update->message->reply_to_message && in_array($from_id,$Dev) && $tc == "private"){
	mahdi('sendmessage',[
        "chat_id"=>$chat_id,
        "text"=>"✅️Sizning xabaringiz foydalanuvchiga yuborildi!"
		]);
	mahdi('sendmessage',[
        "chat_id"=>$reply,
        "text"=>"🔻Sizga admin tomonidan javob keldi:
➖➖➖➖➖
`$textmassage`",
'parse_mode'=>'MarkDown'
		]);
}
if(file_get_contents("data/$fromid.txt") == "true"){
$pluscoin = file_get_contents("data/".$fromid."coin.txt");
$inviter = $cuser["userfild"]["$fromid"]["inviter"];
$invitercoin = $pluscoin / 100 * 20;
	       mahdi('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "⏳Sotib olingan balllar qo‘shilmoqda...",
            'show_alert' =>false
        ]);
		         mahdi('sendmessage',[
        	'chat_id'=>$inviter,
        	'text'=>"💰 | Miqdori: $invitercoin Ball
➖➖➖➖➖
 ✅️ | Sizning balllaringiz qo‘shildi!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
$coin = $cuser["userfild"]["$fromid"]["coin"];
$coinplus = $coin + $pluscoin;
$cuser["userfild"]["$fromid"]["coin"]="$coinplus";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
$inuser = json_decode(file_get_contents("data/$inviter.json"),true);
$coininviter = $inuser["userfild"]["$inviter"]["coin"];
$coinplusinviter = $coininviter + $invitercoin ;
$inuser["userfild"]["$inviter"]["coin"]="$coinplusinviter";;
$inuser = json_encode($inuser,true);
file_put_contents("data/$inviter.json",$inuser);
unlink("data/".$fromid."coin.txt");
unlink("data/$fromid.txt");
}
//==============================================================
//Admin panel
elseif($textmassage=="/panel" or $textmassage=="panel" or $textmassage=="Stark"){
if ($tc == "private") {
if (in_array($from_id,$Dev)){
mahdi('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔹Siz admin boshqaruv panelidasiz.",
         'reply_to_message_id'=>$message_id,
	  'reply_markup'=>json_encode([
    'keyboard'=>[
	  	  	 [
		['text'=>"📊Statistika"],['text'=>"🔐Bloklash"]                  
		 ],
 	[
	  	['text'=>"📧Xabar yuborish"],['text'=>"📬Forward"]
	  ],
	   	[
['text'=>"📍Buyurtmalar"],['text'=>"🗑️Buyurtmani o‘chirish"]
	  ],
	  	   	[
['text'=>"💰Ball berish"],['text'=>"❌Ball olib tashlash"]
	  ],
	  	  	   	[
['text'=>"🗝️Promokod"],['text'=>"🎁Sovg‘a"]
	  ],
	  	  	  	  	   	[
['text'=>"🔓Blokdan olish"]
	  ]
   ],
      'resize_keyboard'=>true
   ])
 ]);
}
}
}
elseif($textmassage=="🔙 | Orqaga | 🔙"){
if ($tc == "private") {
if (in_array($from_id,$Dev)){
mahdi('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔹Siz admin boshqaruv panelidasiz.",
         'reply_to_message_id'=>$message_id,
	  'reply_markup'=>json_encode([
    'keyboard'=>[
	  	  	 [
		['text'=>"📊Statistika"],['text'=>"🔐Bloklash"]                  
		 ],
 	[
	  	['text'=>"📧Xabar yuborish"],['text'=>"📬Forward"]
	  ],
	   	[
['text'=>"📍Buyurtmalar"],['text'=>"🗑️Buyurtmani o‘chirish"]
	  ],
	  	   	[
['text'=>"💰Ball berish"],['text'=>"❌Ball olib tashlash"]
	  ],
	  	  	   	[
['text'=>"🗝️Promokod"],['text'=>"🎁Sovg‘a"]
	  ],
	  	  	  	  	   	[
['text'=>"🔓Blokdan olish"]
	  ]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["$from_id"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
}
}
}
elseif($textmassage=="📊Statistika"){
if (in_array($from_id,$Dev)){
$all = count($user["userlist"]);
$order = count($user["channellist"]);
				mahdi('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"📊 | Botimiz statistikasi: 
➖➖➖➖➖
👥 | Foydalanuvchilar: $all nafar
➖➖➖➖➖
📌 | Kanallar: $order ta",
                'hide_keyboard'=>true,
		]);
		}
}
elseif($textmassage=="🔐Bloklash"){
if (in_array($from_id,$Dev)){
				mahdi('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"🎯 Bloklanadigan foydalanuvchi ID raqamini yuboring!",
   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"🔙 | Orqaga | 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
		]);
$juser["userfild"]["$from_id"]["file"]="block";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
		}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'block') {
if ($textmassage != "🔙 | Orqaga | 🔙") {
if ($forward_from == true) {
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"🔐 | Foydalanuvchi bloklandi;
➖➖➖➖➖
🆔 | ID: $forward_from_id
🌐 | Username: @$forward_from_username",
	  'reply_to_message_id'=>$message_id,
 ]);
$juser["blocklist"][]="$forward_from_id";
$juser["userfild"]["$from_id"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
	         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"🔐 | Bloklandi!
➖➖➖➖➖
📍 | Ma'lumot: $textmassage",
	  'reply_to_message_id'=>$message_id,
 ]);
$juser["blocklist"][]="$textmassage";
$juser["userfild"]["$from_id"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
}
}
elseif ($textmassage == '📧Xabar yuborish' ) {
if (in_array($from_id,$Dev)){
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"🔏 | Xabar matnini kiriting!",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"🔙 | Orqaga | 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["$from_id"]["file"]="sendtoall";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'sendtoall') {
$juser["userfild"]["$from_id"]["file"]="none";
$numbers = $user["userlist"];
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
if ($textmassage != "🔙 | Orqaga | 🔙") {
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"🎯 | Xabaringiz barchaga yuborildi!",
	  'reply_to_message_id'=>$message_id,
 ]);
for($z = 0;$z <= count($numbers)-1;$z++){
     mahdi('sendmessage',[
          'chat_id'=>$numbers[$z],        
		  'text'=>"$textmassage",
        ]);
}
}
}
elseif ($textmassage == '📬Forward' ) {
if (in_array($from_id,$Dev)){
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"🔏 | Xabaringizni kiriting.",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"🔙 | Orqaga | 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["$from_id"]["file"]="fortoall";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'fortoall') {
$juser["userfild"]["$from_id"]["file"]="none";
$numbers = $user["userlist"];
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
if ($textmassage != "🔙 | Orqaga | 🔙") {
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"Xabaringiz barchaga yuborildi!✅",
	  'reply_to_message_id'=>$message_id,
 ]);
for($z = 0;$z <= count($numbers)-1;$z++){
Forward($numbers[$z], $chat_id,$message_id);
}
}
}
elseif($textmassage=="📍Buyurtmalar"){
if (in_array($from_id,$Dev)){
$order = $user["channellist"];
$ordercount = count($user["channellist"]);
for($z = 0;$z <= count($order)-1;$z++){
$result = $result.$order[$z]."\n";
}
				mahdi('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"♾ | Buyurtmalar soni: $ordercount
➖➖➖➖➖
♾ | Buyurtmalar:
$result",
                'hide_keyboard'=>true,
		]);
		}
}
elseif($textmassage=="🗑️Buyurtmani o'chirish"){
if (in_array($from_id,$Dev)){
				mahdi('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"📍 | O‘chirmoqchi bo‘lgan kanalingiz userini menga yuboring.",
  'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"🔙 | Orqaga | 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
		]);
$juser["userfild"]["$from_id"]["file"]="remorder";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
		}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'remorder') {
if ($textmassage != "🔙 | Orqaga | 🔙") {
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"✅️Buyurtma o‘chirildi",
	  'reply_to_message_id'=>$message_id,
 ]);
$how = array_search($textmassage,$user["channellist"]);
unset($user["setmemberlist"][$how]);
unset($user["channellist"][$how]);
$user["channellist"]=array_values($user["channellist"]); 
$user["setmemberlist"]=array_values($user["setmemberlist"]);
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);  
$juser["userfild"]["$from_id"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
}
}
elseif($textmassage=="💰Ball berish"){
if (in_array($from_id,$Dev)){
				mahdi('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"♾ | Foydalanuvchi ID manzilini yuboring.",
  'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"🔙 | Orqaga | 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
		]);
$juser["userfild"]["$from_id"]["file"]="adminsendcoin";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
		}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'adminsendcoin') {
if ($textmassage != "🔙 | Orqaga | 🔙") {
if ($forward_from == true) {
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"💣 | Foydalanuvchi topildi!;
➖➖➖➖➖
🆔 | ID: $forward_from_id
🌐 | Username: @$forward_from_username
➖➖➖➖➖
📍 | Yuboriladigan Balllar sonini kiriting!",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"🔙 | Orqaga | 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["idforsend"]="$forward_from_id";
$juser["userfild"]["$from_id"]["file"]="sethowsendcoin";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
	         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"💰 | Yuboriladigan balllar sonini kiriting
➖➖➖➖➖
💰 | Balllar soni: $textmassage",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"🔙 | Orqaga | 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["idforsend"]="$textmassage";
$juser["userfild"]["$from_id"]["file"]="sethowsendcoin";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'sethowsendcoin') {
if ($textmassage != "🔙 | Orqaga | 🔙") {
$id = $juser["idforsend"];
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"$textmassage ball $id ga yetkazildi.",
	  'reply_to_message_id'=>$message_id,
 ]);
          mahdi('sendmessage',[
        	'chat_id'=>$id,
        	'text'=>"♾ | Sizga admin tomonidan $textmassage ball qo‘shildi!",
			               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
$inuser = json_decode(file_get_contents("data/$id.json"),true);
$coin = $inuser["userfild"]["$id"]["coin"];
$coinplus = $coin + $textmassage;
$inuser["userfild"]["$id"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$id.json",$inuser);
}
}
elseif($textmassage=="❌Ball olib tashlash"){
if (in_array($from_id,$Dev)){
				mahdi('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"♾ | Foydalanuvchi ID manzilini yuboring.",
  'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"🔙 | Orqaga | 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
		]);
$juser["userfild"]["$from_id"]["file"]="adminsendcoin2";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
		}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'adminsendcoin2') {
if ($textmassage != "🔙 | Orqaga | 🔙") {
if ($forward_from == true) {
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"💣 | Foydalanuvchi topildi!;
➖➖➖➖➖
🆔 | ID: $forward_from_id
🌐 | Username: @$forward_from_username
➖➖➖➖➖
📍 | Ayiriladigan balllar sonini kiriting!",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"🔙 | Orqaga | 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["idforsend"]="$forward_from_id";
$juser["userfild"]["$from_id"]["file"]="sethowsendcoin2";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
	         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📍 | Olib tashlanadigan Balllar sonini kiriting!
➖➖➖➖➖
💰 | Balllar soni: $textmassage",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"🔙 | Orqaga | 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["idforsend"]="$textmassage";
$juser["userfild"]["$from_id"]["file"]="sethowsendcoin2";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'sethowsendcoin2') {
if ($textmassage != "🔙 | Orqaga | 🔙") {
$id = $juser["idforsend"];
         mahdiphp('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"$id dan $textmassage ball olib tashlandi!",
	  'reply_to_message_id'=>$message_id,
 ]);
          mahdi('sendmessage',[
        	'chat_id'=>$id,
        	'text'=>"♾ | Admin tomonidan hisobingizdan $textmassage ball olib tashlandi!",
			               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
$inuser = json_decode(file_get_contents("data/$id.json"),true);
$coin = $inuser["userfild"]["$id"]["coin"];
$coinplus = $coin - $textmassage;
$inuser["userfild"]["$id"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$id.json",$inuser);
}
}
elseif($textmassage=="🗝️Promokod"){
if (in_array($from_id,$Dev)){
				mahdi('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"💡 | Promokodni kiriting!
♾ | Kod [@$channelcode] ga yuboriladi!",
  'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"🔙 | Orqaga | 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
		]);
$juser["userfild"]["$from_id"]["file"]="setcodecoin";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
		}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'setcodecoin') {
if ($textmassage != "🔙 | Orqaga | 🔙") {
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"💰Ball miqdorini kiriting!",
	  'reply_to_message_id'=>$message_id,
 ]);
$user["codecoin"]="$textmassage";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
$juser["userfild"]["$from_id"]["file"]="howcodecoin";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'howcodecoin') {
if ($textmassage != "🔙 | Orqaga | 🔙") {
$code = $user["codecoin"];
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"✅️Promokod aktivlashtirildi va @$channelcode kanaliga yuborildi!",
	  'reply_to_message_id'=>$message_id,
 ]);
          mahdi('sendmessage',[
        	'chat_id'=>"@$channelcode",
        	'text'=>"🔰Promokod!🔰
➖➖➖➖➖
🔥 | Kanal: @HorrorFilms_HD 
➖➖➖➖➖
♾ | Kod: $code
➖➖➖➖➖
💰 | Balllar soni: $textmassage
➖➖➖➖➖
🤖 | Bot: @$usernamebot
➖➖➖➖➖
❗ | Koddan faqat bir marta foydalanish mumkin.",
 ]);
$user["howcoincode"]="$textmassage";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
$juser["userfild"]["$from_id"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
}
elseif ($textmassage == '🎁Sovg‘a' ) {
if (in_array($from_id,$Dev)){
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"🎁 | Yubormoqchi bo‘lgan balllaringiz miqdorini kiriting!",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"🔙 | Orqaga | 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["$from_id"]["file"]="sendcointoall";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'sendcointoall') {
$juser["userfild"]["$from_id"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
if ($textmassage != "🔙 | Orqaga | 🔙") {
$numbers = $user["userlist"];
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"✅️Barchaga $textmassage ball yuborildi",
	  'reply_to_message_id'=>$message_id,
 ]);
for($z = 0;$z <= count($numbers)-1;$z++){
   mahdi('sendmessage',[
          'chat_id'=>$numbers[$z],        
		  'text'=>"🎁SOVG‘A🎁
➖➖➖➖➖
💰 | Sizga @FantasticFilmsHD kanali tomonidan $textmassage Ball sovg‘a qilindi!",
          'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 | Orqaga | 🔙",'callback_data'=>'panel']
				   ],
                     ]
               ])
        ]);
$juser = json_decode(file_get_contents("data/$numbers[$z].json"),true);
$coin = $juser["userfild"]["$numbers[$z]"]["coin"];
$coinplus = $coin + $textmassage;
$juser["userfild"]["$numbers[$z]"]["coin"]="$coinplus";
$juser = json_encode($juser,true);
file_put_contents("data/$numbers[$z].json",$juser);	
}
}
}
elseif($update->message->text != true){ 
	mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"❗ | Iltimos, faqat bot tugmalaridan foydalaning
➖➖➖➖➖
📍 | Tugmalarni ko‘rish uchun /start ni bosing",
	  	]);
}
elseif ($textmassage == '🔓Blokdan olish' ) {
if (in_array($from_id,$Dev)){
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"🔓 | Barcha bloklangan foydalanuvchilar blokdan olindi.",
	  'reply_to_message_id'=>$message_id,
 ]);
$user = (file_get_contents("data/user.json"));
file_put_contents("data/backup.json",$user);	
}
}
unlink("error_log");
/*
Kod @Kino_Hacker tomonidan
@Hacker_Qasoskorlar uchun qayta tuzildi.
Kodni sotish man etiladi!
*/
?>
