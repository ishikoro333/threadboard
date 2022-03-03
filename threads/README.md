リンク先 : <a href="https://ishikoro.link/threads" target="_blank" rel="noopener noreferrer">thread</a>	


テストアカウント：z_gundum@example.com

パスワード：12345678

## [作成した経緯]

Docker、AWS・S3を用いて、画像投稿機能を実装する目的で作成。

ローカル環境で実装できたため、EC2へのデプロイを試みる

## [実装内容]

ログイン機能

スレッド作成・メッセージ投稿機能

S3を用いた画像投稿機能(ローカル環境では実装済み　※EC2上にS3をマウントする必要あり)

Adminユーザーによる、スレッド・メッセージの削除機能

ページネーション機能

URLのリンク変換


## [考慮した点]

スレッド、メッセージ保存時のトランザクション処理の実装

Model/View/Controller/Service/Repositoryの切り分け

## [課題]

EC２にデプロイする(デプロイ済み)

EC2上にトップページを表示できたため、AWS-RDSとの接続とssl接続に対応させる(接続済み)

EC2にS3をマウントする


--------------------------

<p align="center"><a href=""><img src="https://user-images.githubusercontent.com/86862665/155313266-ea692477-a4cc-4ff8-a32a-a6a3e1be257e.png" width="600"></a></p>
<p align="center"><a href=""><img src="https://user-images.githubusercontent.com/86862665/155313277-17f457cc-8331-43f1-adea-8267fb0875e5.png" width="600"></a></p>
<p align="center"><a href=""><img src="https://user-images.githubusercontent.com/86862665/155313290-e5796c82-dd43-4228-b1e9-e7f0321c20f5.png" width="600"></a></p>
