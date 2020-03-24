<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);
$text = strtolower($text);
header("Content-Type: application/json");
$response = '';
if(strpos($text, "/start") === 0 || $text=="ciao")
{
    $response = "Ciao $firstname 😀. Con questo BOT potrai essere sempre aggiornato sul numero di casi di Covid-19 in Italia, Stati Uniti, Spagna e nel resto del mondo. 🦠📰\r\nUsa i comandi /italia@coronavirusupdates_bot per visualizzare la situazione aggiornata in Italia 🇮🇹;\r\n/spagna@coronavirusupdates_bot per la situazione spagnola 🇪🇸;\r\n/usa@coronavirusupdates_bot per conoscere la situazione negli Stati Uniti d'America 🇺🇸;\r\n/mondo@coronavirusupdates_bot per avere un quadro generale della situazione 🌍.";
}
elseif($text=="/italia" || $text=="/italia@coronavirusupdates_bot")
{
    $response = "Gli ultimi dati italiani sono i seguenti:\r\n54.030 ATTUALMENTE POSITIVI,\r\n6820 DECEDUTI,\r\n8326 GUARITI.\r\nPer conoscere ulteriori dettagli, clicca su /dettagli@coronavirusupdates_bot";
}
elseif($text=="/dettagli" || $text=="/dettagli@coronavirusupdates_bot")
{
    $response = "PAZIENTI IN ISOLAMENTO DOMICILIARE: 28.697,\r\nPAZIENTI RICOVERATI CON SINTOMI: 21.937,\r\nPAZIENTI IN TERAPIA INTENSIVA: 3336";
}
elseif($text=="/spagna" || $text=="/spagna@coronavirusupdates_bot")
{
    $response = "Gli ultimi dati spagnoli sono i seguenti:\r\n39.673 ATTUALMENTE POSITIVI,\r\n2696 DECEDUTI,\r\n3794 GUARITI,\r\n22762 RICOVERATI.";
}
elseif($text=="/usa" || $text=="/usa@coronavirusupdates_bot")
{
    $response = "Gli ultimi dati americani sono i seguenti:\r\n44.183 ATTUALMENTE POSITIVI,\r\n544 DECEDUTI.";
}
elseif($text=="/mondo" || $text=="/mondo@coronavirusupdates_bot")
{
    $response = "I dati mondiali della pandemia di COVID-19 sono i seguenti: \r\n410.465 CASI TOTALI,\r\n18.295 DECEDUTI,\r\n107.089 GUARITI.\r\nPer ulteriori dettagli, visita il seguente sito web: https://www.worldometers.info/coronavirus/";
}
else
{
    $response = "";
}
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
