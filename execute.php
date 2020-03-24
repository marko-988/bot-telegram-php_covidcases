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
    $response = "Ciao $firstname, sono il bot del gruppo A7A. Scrivi /serie per sapere quali serie traduciamo al momento, o /sub per conoscere l'avanzamento delle traduzioni. Per contattarci, usa /scrivici";
}
elseif($text=="/serie" || $text=="/serie@a7asubtitlesbot")
{
    $response = "Al momento ci occupiamo delle seguenti serie 📺:\r\nSupernatural s15,\r\nThe Flash s06,\n\rArrow S08 (solo Crossover),\n\rLegends of Tomorrow s05 (solo crossover),\r\nNCIS Los Angeles s11,\nTraces,\r\nThe Capture,\nA Confession,\r\nWorld on Fire,\nWatchmen,\r\nThe 100 s06,\nVeronica Mars s04,\nVictoria,\nVera s10,\nWhite House Farm,\r\nOutlander - Stagione 5,\r\nThe Plot Against America,\r\nBelgravia";
}
elseif($text=="watchmen")
{
    $response = "Episodi 1x07, 1x08, 1x09: IN REVISIONE";
}
elseif($text=="world on fire")
    {
        $response = "Episodio 1x07 - finale di stagione: IN REVISIONE";
    }
elseif($text=="/sub" || $text=="/sub@a7asubtitlesbot")
    {
        $response = "Di quale serie vorresti conoscere l'avanzamento?\r\nScrivi il titolo della serie citando questo messaggio.";
    }
elseif($text=="supernatural")
    {
        $response = "Episodio 15x13: IN TRADUZIONE";
    }
elseif($text=="the flash")
    {
        $response = "Episodio 6x09 Crisis Parte 3: IN LAVORAZIONE AVANZATA";
    }
elseif($text=="ncis los angeles")
    {
        $response = "Episodio 11x18: IN TRADUZIONE";
    }
elseif($text=="traces")
    {
        $response = "Episodio 1x06 Finale di Stagione: PUBBLICATO ✅";
    }
elseif($text=="the capture")
    {
        $response = "Episodi da 1x02 a 1x06: IN LAVORAZIONE.\r\nLa serie verrà recuperata appena possibile, compatibilmente con gli impegni di vita reale del team.";
    }
elseif($text=="a confession")
    {
        $response = "Episodi 1x05 e 1x06: IN ATTESA DI REVISIONE";
    }
elseif($text=="the 100")
    {
        $response = "Episodi da 6x09 a 6x13: IN LAVORAZIONE.\r\nLa serie verrà completata entro la messa in onda della stagione 7.";
    }
elseif($text=="veronica mars")
    {
        $response = "Episodi 4x06, 4x07 e 4x08: IN LAVORAZIONE.\r\nLa serie verrà completata appena possibile.";
    }
elseif($text=="call the midwife")
    {
        $response = "Episodio 9x08 Finale di Stagione: PUBBLICATO ✅";
    }
elseif($text=="victoria")
    {
        $response = "Episodi da 3x03 a 3x08: IN LAVORAZIONE.\r\nLa serie verrà recuperata appena possibile, compatibilmente con gli impegni di vita reale del team.";
    }
elseif($text=="vera")
    {
        $response = "Episodio 10x02: PUBBLICATO ✅\r\nEpisodio 10x03: IN TRADUZIONE\r\nEpisodio 10x04: IN TRADUZIONE";
    }
elseif($text=="white house farm")
    {
        $response = "Episodio 1x03: PUBBLICATO ✅\r\nEpisodio 1x04: IN REVISIONE\r\nEpisodio 1x05: IN TRADUZIONE\r\nEpisodio 1x06: IN TRADUZIONE";
    }
elseif($text=="the gloaming")
    {
        $response = "Episodio 1x08 Finale di Stagione: PUBBLICATO ✅";
    }
elseif($text=="/scrivici" || $text=="/scrivici@a7asubtitlesbot")
    {
        $response = "Per feedback, segnalazioni o domande, contatta lo staff attraverso il seguente bot: @contattaci_a7a_bot";
    }
elseif($text=="arrow")
     {
         $response = "Episodio 8x08 - Crisis Parte 4 - IN TRADUZIONE\r\n(Ci occupiamo solo del crossover)";
     }
elseif($text=="legends of tomorrow")
    {
        $response = "Episodio 5x01 - Crisis Parte 5 - IN TRADUZIONE\r\n(Ci occupiamo solo del crossover)";
    }
elseif($text=="/prossimamente" || $text=="/prossimamente@a7asubtitlesbot")
    {
        $response = "Prossimamente ci occuperemo delle seguenti serie:\r\n- Stargirl (DC)\r\n- Belgravia (ITV/EPIX)\r\n🚧LISTA IN CONTINUO AGGIORNAMENTO";
    }
elseif($text=="endeavour")
    {
        $response = "Episodio 7x03 Finale di Stagione: PUBBLICATO ✅";
    }
elseif($text=="outlander")
    {
       $response = "Episodio 5x06: PUBBLICATO ✅";
    }
elseif($text=="the plot against america")
    {
       $response = "Episodio 1x02: IN TRADUZIONE";
    }
elseif($text=="belgravia")
    {
       $response = "Episodio 1x01: PUBBLICATO ✅\r\nEpisodio 1x02: IN TRADUZIONE";
    }                 
else
{
    $response = "";
}
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
