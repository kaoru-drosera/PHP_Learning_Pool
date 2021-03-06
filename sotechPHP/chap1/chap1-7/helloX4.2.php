<?php
ini_set("display_errors",1);
error_reporting(E_ALL & ~E_NOTICE);

 ?>
<?php
require_once("helloSinX3.5_Staff.php");
 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>オブジェクト指向</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.ico">
  <link rel="apple-touch-icon-precomposed" href="/favicon-152.png">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <style>
    .table1 thead th{
      background-color: black;
      color: white;
    }
    .pdg{
      padding-top: 50px;
    }
    .gaiyo{
      background-color: rgb(255, 227, 227);
    }
    .imgwrap{
      max-width: 800px;
      width: 100%;
    }
    .imgwrap img{
      width: 100%;
    }
  </style>
  <div class="main-contents">
    <h2>クラスの継承</h2>
    <h3>クラスの継承</h3>
    <p><strong>「クラスの継承」</strong>とは、<strong>既存のクラスを拡張するように自身のクラスを定義する</strong>方法である。</p>
    <p class="pdg"></p>
    <p>クラスAをもとにクラスBを作りたい時、クラスAを継承して追加機能だけをクラスBで定義する。</p>
    <p>ベースになるクラスAのコードを改変せず拡張するので、</p>
    <p><strong>拡張による影響がクラスAには及ばない</strong>というメリットがある。</p>
    <p>公式は以下の通り。</p>
    <pre>
      class 子クラス extends 親クラス{

      }
    </pre>
    <h3>親クラスのPlayerクラス</h3>
    <p>では実際にクラス継承を簡単な例で試してみましょう。</p>
    <p>コードは以下の通り。</p>
    <pre>
      // Playerクラスを定義する
      class Player{
        // インスタンスプロパティ
        public $name;

        // コンストラクタ
        function __construct($name = "名無し"){
          // 引数が省略された場合の初期値 ↑
          $this->name = $name;
        }

        // ストリングにキャストされてた時に返す文字列。
        // マジックメソッドの定義。
        public function __toString(){
          return $this->name;
        }

        // インスタンスメソッド
        public function who(){
          echo "{$this->name}です。","\n";
        }
      }
    </pre>
    <pre>
      <?php
        // // Playerクラスを定義する
        // class Player{
        //   // インスタンスプロパティ
        //   public $name;
        //
        //   // コンストラクタ
        //   function __construct($name = "名無し"){
        //     // 引数が省略された場合の初期値 ↑
        //     $this->name = $name;
        //   }
        //
        //   // ストリングにキャストされてた時に返す文字列。
        //   // マジックメソッドの定義。
        //   public function __toString(){
        //     return $this->name;
        //   }
        //
        //   // インスタンスメソッド
        //   public function who(){
        //     echo "{$this->name}です。","\n";
        //   }
        // }
       ?>
    </pre>
    <p>まず、親となるPlayerクラスを用意します。</p>
    <p>Playerクラスには$nameプロパティ、コンストラクタ、マジックメソッドの__toString()、</p>
    <p>そしてwho()メソッドが定義してあります。</p>
    <p class="pdg"></p>
  </div><!--  .main-contents -->

  <div class="main-contents">
    <h3>子クラスのSoccerクラス</h3>
    <p>次にPlayerクラスの子クラスとなるSoccerクラスを作る。</p>
    <p>SoccerクラスはPlayerクラスを継承するので、最初にPlayerクラスを定義しているPlayerファイルを読み込む。</p>
    <p>次に<strong>「class Soccer extends Player」</strong>のようにPlayerクラスを親クラスに指定して</p>
    <p>Soccerクラスを定義する。Soccerクラスにはplay()メソッドを定義している。</p>
    <p>play()メソッドでは{$this->name}のようにSoccerクラスでは定義していない</p>
    <p>$nameプロパティを仕様している点に注目するよう。</p>
    <pre>
      // Playerクラス定義ファイルを読み込む

      // requre_once("Player.php");
      requre_once("helloX4_Player.php");
      class Soccer extends Player{
        public function play(){
          echo "{$this->name}がシュート","\n";
        }
      }
    </pre>
    <pre>
      <?php
        // Playerクラス定義ファイルを読み込む

        // requre_once("Player.php");
        // require_once("helloX4_Player.php");
        // class Soccer extends Player{
        //   public function play(){
        //     echo "{$this->name}がシュート","\n";
        //   }
        // }
       ?>
    </pre>
  </div>

  <div class="main-contents">
    <h3>Soccerクラスのインスタンスを作って利用する</h3>
    <P>では、子クラスのSoccerクラスを使って継承の機能を確かめてみよう。</P>
    <p>次のコードを使ってSoccerクラスのインスタンスを作る。</p>
    <pre>

    </pre>
    <pre>
      <?php
        // クラスファイルを読みこむ
        // require_once("Soccer.php");
        require_once("helloX4_Soccer.php");

        // Soccerクラスのインスタンスを作る;
        $player1 = new Soccer("伸次");

        // 親クラスのメソッドを試す
        $player1->who();
        // who()は親クラスのPlayerクラスで
        // 定義している。

        // 子クラスのメソッドを試す
        $player1->play();
       ?>
       <?php
       // Soccerクラスのインスタンスを作る
        $player2 = new Soccer("つばさ");

        // __toString()メソッドを試す
        echo "{$player2}";
        // マジックメソッドの__toString()で
        // 文字列にキャストされる
        ?>
    </pre>
  </div>

  <div class="main-contents">
    <h3>子クラスのコンストラクタから親クラスのコンストラクタを呼び出す</h3>
    <p>子クラスにコンストラクタが定義されている時はどうなるだろうか？</p>
    <p class="pdg"></p>
    <pre>
      // Runnerクラス
      // require_once("Player.php");
      require_once("helloX4_Player.php");
      // Runnerクラスを定義する
      class Runner extends Player{
        // プロパティ
        public $age;
        // Runnerクラスでは$ageプロパティのみが定義されている。

        // コンストラクタ
        function __construct($name, $age){
          // 親クラスのコンストラクタを呼ぶ
          parent::__construct($name);
          // Playerクラスのコンストラクタに$nameを渡す

        }

        // インスタンスメソッド
        public function play(){
          echo "{$this->name}が走る！","\n";
        }
      }
    </pre>
    <pre>
      <?php
      // // Runnerクラス
      // // require_once("Player.php");
      // require_once("helloX4_Player.php");
      // // Runnerクラスを定義する
      // class Runner extends Player{
      //   // プロパティ
      //   public $age;
      //   // Runnerクラスでは$ageプロパティのみが定義されている。
      //
      //   // コンストラクタ
      //   function __construct($name, $age){
      //     // 親クラスのコンストラクタを呼ぶ
      //     parent::__construct($name);
      //     // Playerクラスのコンストラクタに$nameを渡す
      //
      //   }
      //
      //   // インスタンスメソッド
      //   public function play(){
      //     echo "{$this->name}が走る！","\n";
      //   }
      // }
       ?>
    </pre>
    <p>次のRunnerクラスはSoccerクラスと同じようにPlayerクラスを継承して作られているが、</p>
    <p>年齢の$ageプロパティが追加されてある。</p>
    <p>この$ageプロパティの初期値をインスタンス作成時に設定したいものだが、</p>
    <p><strong>インスタンス作成時には$nameプロパティの値も引数で受け取る必要がある</strong>。</p>
    <p class="pdg"></p>
    <p>つまり、インスタンス作成時に<strong>「new Runner("福治",23)」のように名前と年齢の両方の値を受け取り</strong>、</p>
    <p><strong>名前は親クラスのPlayerクラスのコンストラクタに送り</strong>、</p>
    <p><strong>年齢は子クラスのRunnerクラスのコンストラクタで処理</strong></p>
    <p>できるようにしなければならない。</p>
    <p class="pdg"></p>
    <p>そこで、<strong>次のRunnerクラスのコンストラクタのように、子クラスのコンストラクタから</strong></p>
    <p><strong>親クラスのコンストラクタをparent::__construct($name)のように呼び出して値を渡す</strong>。</p>
    <p>これで、親クラスで$nameの初期値が設定され、続いて子クラスの$ageも初期化できる。</p>
    <p class="pdg"></p>
    <h3>インスタンスを親クラスと子クラスのコンストラクタで初期化する</h3>
    <p>では実際に作った「Runner」クラスのインスタンスを作って試してみよう。</p>
    <p>new Runner("福治",23)でインスタンス$runner1を作ってprint_r($runner1)で確認すると、</p>
    <p>$nameと$ageの両方のプロパティに値が設定されていることが確認できる。</p>
    <pre>
      // クラスファイルを読み込む
      require_once("helloX4.2_Runner.php");

      // Runnerクラスのインスタンスを作る
      $runner1 = new Runner("福治",23);
      // インスタンスを確認する
      print_r($runner1);

      // 「parent::__construct()」でnameを読んでおいたおかげ？
    </pre>
    <pre>
      <?php
        // クラスファイルを読み込む
        require_once("helloX4.2_Runner.php");

        // Runnerクラスのインスタンスを作る
        $runner1 = new Runner("福治",23);
        // インスタンスを確認する
        print_r($runner1);
       ?>
    </pre>
    <pre>
      Runner Object
(
    [age] => 23 ←子クラスで定義しているプロパティ
    [name] => 福治 ←親クラスで定義しているプロパティ
)
    </pre>
    <p class="pdg"></p>
    <h3>親クラスのメソッドをオーバーライドして書き換える</h3>
    <p><strong>クラスを継承している親クラスのメソッドをそのまま使うのではなく、</strong></p>
    <p><strong>子クラスで同じ名前のメソッドを定義することで、親クラスの同名のメソッドを上書きすることができる。</strong></p>
    <p>この手法を<strong>「オーバーライド」</strong>という。</p>
    <p class="pdg"></p>
    <p>先のRunnerクラスでは$ageプロパティを追加しましたが、親クラスのPlayerクラスの</p>
    <p>who()メソッドでは$nameプロパティのみを表示している。</p>
    <pre>
      // Playerクラスのwho()メソッド
      public function who(){
        echo "{$this->name}です。","\n";
      }
    </pre>
    <pre>
      <?php
        // // Playerクラスのwho()メソッド
        // public function who(){
        //   echo "{$this->name}です。","\n";
        // }
       ?>
    </pre>
    <p>そこで、このwho()を子クラスのRunnerクラスでオーバーライドして、</p>
    <p>年齢も表示するwho()に変えてみる。</p>
    <pre>
      // Runnerクラス
      // require_once("Player.php");
      require_once("helloX4_Player.php");
      // Runnerクラスを定義する。
      // Playerクラスをここで継承。
      class Runner extends Player{
        // プロパティ
        public $age;
        // Runnerクラスでは$ageプロパティのみが定義されている。

        // コンストラクタ
        function __construct($name, $age){
          // 親クラスのコンストラクタを呼ぶ
          parent::__construct($name);
          // Playerクラスのコンストラクタに$nameを渡す
          $this->age = $age;
          // 忘れてた。
          // 新たに加える要素は普通に呼び出す。
        }


        // オーバーライドする
        // Playerクラスのwho()メソッドを
        // ここでオーバーライド。
        public function who(){
          echo "{$this->name}、{$this->age}歳です。","\n";
        }


        // インスタンスメソッド
        public function play(){
          echo "{$this->name}が走る！","\n";
        }
      }
    </pre>
    <pre>
      <?php
      // // Runnerクラス
      // // require_once("Player.php");
      // require_once("helloX4_Player.php");
      // // Runnerクラスを定義する。
      // // Playerクラスをここで継承。
      // class Runner extends Player{
      //   // プロパティ
      //   public $age;
      //   // Runnerクラスでは$ageプロパティのみが定義されている。
      //
      //   // コンストラクタ
      //   function __construct($name, $age){
      //     // 親クラスのコンストラクタを呼ぶ
      //     parent::__construct($name);
      //     // Playerクラスのコンストラクタに$nameを渡す
      //     $this->age = $age;
      //     // 忘れてた。
      //     // 新たに加える要素は普通に呼び出す。
      //   }
      //
      //   // オーバーライドする
      //   // Playerクラスのwho()メソッドを
      //   // ここでオーバーライド。
      //   public function who(){
      //     echo "{$this->name}、{$this->age}歳です。","\n";
      //   }
      //
      //   // インスタンスメソッド
      //   public function play(){
      //     echo "{$this->name}が走る！","\n";
      //   }
      // }
       ?>
    </pre>
    <h3>オーバーライドしたwho()を試す</h3>
    <p>それでは、Runnerクラスのインスタンスを作ってwho()メソッドを試してみよう。</p>
    <pre>
      // Runnerクラスのインスタンスを作る
      $runner1 = new Runner("福治",23);
      // オーバーライドしたwho()を試す
      $runner1->who();
    </pre>
    <pre>
      <?php
        // Runnerクラスのインスタンスを作る
        $runner1 = new Runner("福治",23);
        // オーバーライドしたwho()を試す
        $runner1->who(); // Runnerクラスで定義したwho()が実行される。
       ?>
    </pre>
  </div>










    ;

</body>
</html>
