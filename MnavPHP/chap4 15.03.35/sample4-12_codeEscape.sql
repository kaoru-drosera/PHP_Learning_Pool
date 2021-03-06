-- さらに便利な自動採番
-- オートインクリメントを学ぶ

-- オートインクリメントは、プライマリーキーを設定して初めて
-- 使えるようになるよ！

-- データに番号をつけたい時、SQLでは「次のID番号を知ること」が必要になる。
-- とはいっても、「13番目のデータの次に14を振りたい」時であればともかく
-- 「13851番目」の次をすぐに特定できるだろうか？
-- …まぁ面倒なので、「自動連番」要は「自動で順に番号を振る機能」をつけたほうが便利なのだ。

-- カラムの「変更(Change)」メニューをクリックして、「A_I」の欄にチェックをつけることで
-- 「自動連番機能」、名をば「オートインクリメント機能」の設定が完了するのだ。

-- この時、「#1067 - 'item'へのデフォルト値が無効です。」というエラーが発生した時は
-- 「デフォルト値」に値があるかどうか確認してみよう。
-- 値を「none(なし)」にすれば解決するはずだ。

-- 次のようにデータを挿入してみると…？
①:INSERT INTO my_item SET item_name='にんじん', price=120
②:INSERT INTO my_item SET item_name='さつまいも', price=150
…
-- 例えば1番目にデータがあった場合には、2番目3番目と順番に「id」に番号を振ってくれる。


-- なお、特定のデータを削除した場合、「1,2,3」とした場合、2番目を消しても「1,2,3」と歯抜けの状態になる。
-- 消したデータのある「id=2」にデータを入れようとした場合も「id=4」に入ってしまうのだ。
-- 一見不便だが、逆に言えば「消したデータの番号がわかる」ということでもあり理にかなった行動ではある。


-- エラーバスティング：
ALTER TABLE [TABLENAME] CHANGE [COLUMNNAME] [COLUMNNAME] int(11) AUTO_INCREMENT;
ERROR 1062 (23000): ALTER TABLE causes auto_increment resequencing, resulting in duplicate entry '1' for key 'PRIMARY'

-- オートインクリメント二設定する値に0がある場合に起きているので、
-- IDが「0」のレコードを削除すればどうだろう？
-- THANKS:https://saba.omnioo.com/note/627/mysql%E3%81%A7%E3%82%AA%E3%83%BC%E3%83%88%E3%82%A4%E3%83%B3%E3%82%AF%E3%83%AA%E3%83%A1%E3%83%B3%E3%83%88%E3%82%92%E8%A8%AD%E5%AE%9A%E3%81%99%E3%82%8B/
