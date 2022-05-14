# アプリケーション名
迷惑メール110番
# アプリケーション概要
投稿者はなりすましメールの情報と画像を投稿し、注意を促します。
利用者はなりすましメールかどうか判別できないメールが送られてきた時、タイトルまたは本文の一部をコピペしてアプリで検索し、情報を共有する事でなりすましメールを判別します。
# URL
[https://junkmail110.herokuapp.com/](https://junkmail110.herokuapp.com/)
#　テスト用アカウント
- Basic認証ID:admin
- Basic認証パスワード：2222
- メールアドレス：user@gmail.com
- パスワード：junkmail110

# 利用方法
### 投稿者
- アカウントを持っているユーザーは「Login」のリンクをクリックし、ログイン画面でログインします。
- アカウントを持っていないユーザーは「Register」のリンクをクリックし、サインアップ画面でアカウントを登録します。
- 投稿するのリンクをクリックし、新規投稿画面でタイトル、本文を入力、画像を添付して「送信」ボタンで投稿完了
### 利用者
- 送られてきたメールのタイトルまたは本文の一部を検索窓にコピペして、該当のメールが投稿していないか確認します。
- 同じメールの投稿を確認する事で、なりすましメールである事を共有できます。
- メール情報の他、他のユーザーからのコメントも閲覧できます。また、ログインしている場合は自身もコメントを投稿できます。
# アプリケーションを作成した背景
- 最近のなりすましメールの中には精度の高いものが多く、無闇にクリックしてしまう事はなくても「本当に放っておいていいのだろうか？」と不安になる人もいるのではないかと考えました。
そこで、同じメールが送られてきた、という情報を他のユーザーと共有する事で、不安を取り除くのに一役買う事ができればという考えから当該アプリケーションを開発する事にしました。
# 洗い出した要件
[要件を定義したシート](https://docs.google.com/spreadsheets/d/1w0f2LKN0eSovQbMAn5-qOVLs4eR0CB4EXwejvZXZF0Y/edit#gid=982722306)
# 実装した機能についての画像
- [ユーザー新規登録](https://gyazo.com/6c61731116b3dddaf6bf6bb7718a64b7)<br>
- [ユーザーログイン](https://gyazo.com/67aa1adfc169e56de88d364656c5f381)<br>
# データベース設計
[![Image from Gyazo](https://i.gyazo.com/d5f6c85218e9765e150e2e4e811aff09.png)](https://gyazo.com/d5f6c85218e9765e150e2e4e811aff09)

# 画面遷移図
[![Image from Gyazo](https://i.gyazo.com/97656d053fde6143be4858e0dc7bf459.png)](https://gyazo.com/97656d053fde6143be4858e0dc7bf459)

# 開発環境
- フロントエンド:HTML,CSS
- バックエンド:PHP(Laravel)
- インフラ:heroku
- テキストエディタ:VSCode
- タスク管理:GitHub

# ローカルでの動作方法
以下のコマンドを順に実行<br>
% git clone https://github.com/kanieksuke/junkmail110<br>
% cd mammon-quest<br>
% bundle install<br>
% yarn install<br>