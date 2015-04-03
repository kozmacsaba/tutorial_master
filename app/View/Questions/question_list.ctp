<div class="col-md-9">
    <?php
        foreach ($questionList as $list){
        $response = $list['Question']['respons'];
        }
        $response = json_decode($response);
        $helyesvalasz = !empty($response->helyesvalasz) ? $response->helyesvalasz : "";
        $rosszvalasz = !empty($response->rosszvalasz) ? $response->rosszvalasz : "";
        $rosszvalasz1 = !empty($response->rosszvalasz1) ? $response->rosszvalasz1 : "";
        $rosszvalasz2 = !empty($response->rosszvalasz2) ? $response->rosszvalasz2 : "";
        
        echo $helyesvalasz;
        echo '<br>';
        echo $rosszvalasz;
        echo '<br>';
        echo $rosszvalasz1;
        echo '<br>';
        echo $rosszvalasz2;
    ?>
</div>