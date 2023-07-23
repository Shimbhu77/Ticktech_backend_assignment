<html>
  <head>
    <title>PHP API Test</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php

       $apiBaseURL = 'https://jsonplaceholder.typicode.com/posts';

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, $apiBaseURL);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_USERAGENT, 'firstphp');

      $response = curl_exec($ch);

      if (curl_errno($ch)) {
          echo 'cURL Error: '. curl_error($ch);
      }

      curl_close($ch);

      // Use the $response data as needed
      // echo $response;

      $data = json_decode($response, true);

      $html = '';

      foreach ($data as $item) {
        $html .= '<div class="item">';
        $html .= '<h2>' . $item['title'] . '</h2>';
        $html .= '<p>' . $item['body'] . '</p>';
        $html .= '</div>';
      }

      echo $html;
    ?>

   


  </body>

</html>