<pre><?php
    require('simple_html_dom.php');

    $productId = $_GET['IDproduktu'];
    $baseUrl = 'http://www.ceneo.pl/';
    $opinonsTab = '/#tab=reviews';
    $opinionSub = '/opinie-';
    $url = $baseUrl . $productId . $opinonsTab;
    $site = 2;
    $product = Array();
    $opinions = Array();
    $info = Array();

    $html = new simple_html_dom();
    $html->load_file($url);

    $product['nazwa'] = $html->find(".product-name", 0)->innertext;
    $product['cena'] = $html->find(".price", 0)->innertext;
    $product['Ocena'] = $html->find(".product-score", 0)->innertext;
    
    foreach ($html->find('ol li[class=product-review]') as $a) {
        $info['Opiniujacy'] = $a->find(".product-reviewer", 0)->innertext;
        if( $a->find(".product-recommended", 0) ){
            $info['Rekomendacja'] = $a->find(".product-recommended", 0)->innertext;
        }
        else{
           $info['Rekomendacja'] = null; 
        }
        $info['Zalety'] = trim($a->find(".pros-cell", 0)->innertext);
        $info['Wady'] = $a->find(".cons-cell", 0)->innertext;
        $info['Gwiazdki'] = $a->find(".review-score-count", 0)->innertext;
        $info['Data opinii'] = $a->find(".review-time", 0)->innertext;
        $info['Na TAK'] = $a->find(".vote-yes", 0)->innertext;
        $info['Na NIE'] = $a->find(".vote-no", 0)->innertext;
        array_push($opinions, $info);
        echo '###############';
    }

     do{
        $elementNr = 0;
        $subPageUrl = $baseUrl . $productId . $opinionSub . $site;
        
        $html->load_file($subPageUrl);
        foreach ($html->find('ol li[class=product-review]') as $a) {
        $info['Opiniujacy'] = $a->find(".product-reviewer", 0)->innertext;
        if( $a->find(".product-recommended", 0) ){
            $info['Rekomendacja'] = $a->find(".product-recommended", 0)->innertext;
        }
        else{
           $info['Rekomendacja'] = null; 
        }
        $info['Zalety'] = trim($a->find(".pros-cell", 0)->innertext);
        $info['Wady'] = $a->find(".cons-cell", 0)->innertext;
        $info['Gwiazdki'] = $a->find(".review-score-count", 0)->innertext;
        $info['Data opinii'] = $a->find(".review-time", 0)->innertext;
        $info['Na TAK'] = $a->find(".vote-yes", 0)->innertext;
        $info['Na NIE'] = $a->find(".vote-no", 0)->innertext;
        echo '###############';
    }
        $site++;
    }while ($html->find('.arrow-next'));
        
        print_r($opinions);


//$info['Opiniujacy']    = $html->find(".product-reviewer",0)->innertext;
//$info['Rekomendacja']   = trim( $html->find(".product-recommended",0)->innertext );
//$info['Zalety']   = trim( $html->find(".pros-cell",0)->innertext );
//$info['Wady']    = $html->find(".cons-cell",0)->innertext;
//$info['Gwiazdki']    = $html->find(".review-score-count",0)->innertext;
//$info['Data opinii']    = $html->find(".review-time",0)->innertext;
//$info['Na TAK']    = $html->find(".vote-yes",0)->innertext;
//$info['Na NIE']    = $html->find(".vote-no",0)->innertext;
//print_r($info);

    /*
      $html2 = file_get_html("http://www.ceneo.pl/$adresik/#tab=reviews");
      $info['Opinie'] = $html2->find(".product-review",0)->innertext;
      $info['Opinie'] = $html2->find(".product-review",1)->innertext;
     */
//$html2 = new simple_html_dom();
// 
//$html2->load_file("http://www.ceneo.pl/$adresik/#tab=reviews");
//$count = 1;
//
//while ($count <= 10){
//echo '#####################################################################################';
//$info2['Opiniujacy']    = $html2->find(".product-reviewer",$count)->innertext;
//$info2['Opinia']   = trim( $html->find(".product-review-body",$count)->innertext );
//$info2['Rekomendacja']   = trim( $html->find(".product-recommended",$count)->innertext );
//$info2['Zalety']   = trim( $html2->find(".pros-cell",$count)->innertext );
//$info2['Wady']    = $html2->find(".cons-cell",$count)->innertext;
//$info2['Gwiazdki']    = $html2->find(".review-score-count",$count)->innertext;
//$info2['Data opinii']    = $html2->find(".review-time",$count)->innertext;
//$info2['Na TAK']    = $html2->find(".vote-yes",$count)->innertext;
//$info2['Na NIE']    = $html2->find(".vote-no",$count)->innertext;
//
//echo '#####################################################################################';
//
//print_r($info2);
//$count = $count + 1;
//}
//
///* ########################################################################################## */
//
//$site = 2;
//$count3 = 0;
//$count2 = 1;
//while ($site <= 4){
//
//
//$html3 = new simple_html_dom();
// 
//$html3->load_file("http://www.ceneo.pl/$adresik/opinie-$site");
//
//
//while ($count2 <= 10 ){
//echo '#####################################################################################';
//$info3['Opiniujacy']    = $html3->find(".product-reviewer",$count2)->innertext;
//$info3['Opinia']   = trim( $html3->find(".product-review-body",$count2)->innertext );
//$info3['Rekomendacja']   = trim( $html3->find(".product-recommended",$count2)->innertext );
//$info3['Zalety']   = trim( $html3->find(".pros-cell",$count2)->innertext );
//$info3['Wady']    = $html3->find(".cons-cell",$count2)->innertext;
//$info3['Gwiazdki']    = $html3->find(".review-score-count",$count2)->innertext;
//$info3['Data opinii']    = $html3->find(".review-time",$count2)->innertext;
//$info3['Na TAK']    = $html3->find(".vote-yes",$count2)->innertext;
//$info3['Na NIE']    = $html3->find(".vote-no",$count2)->innertext;
//
//echo '#####################################################################################';
//
//print_r($info3);
//$count2 = $count2 + 1;
//
//}
//$site = $site + 1;
//echo $count2;
//$count3 = $count3 + $count2;
//}
//echo 'Ilosc opini:';echo $count-1;
//echo 'Ilosc opini:';echo $count+$count3;
    ?>