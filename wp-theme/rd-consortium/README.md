# R&D Consortium — WordPressテーマ

リポジトリ直下の静的HTML版（`index.html` ほか）をWordPressクラシックテーマに変換したものです（v2.0.0 = 2026年9月17日時点の静的版と同一）。
デザイン・文言は静的版と同一で、**ニュースをWordPressの投稿で更新できる**ようになっています（提案書のwordpress①に対応）。

## ファイル構成

| ファイル | 役割 |
|---|---|
| `style.css` | テーマ情報ヘッダー + 静的版 `styles.css` と同一のスタイル + 末尾にWordPress固有の追加分 |
| `js/script.js` | 静的版 `script.js` と同一（3D背景モジュールの読み込みパスのみテーマ用に変更） |
| `assets/` | 写真・動画・QRコード・Three.js（`assets/js/`）。静的版の `assets/` から使用分のみコピー |
| `functions.php` | フォント/CSS/JS読み込み、プロジェクト事例の投稿タイプ、ニュース・事例表示の補助関数 |
| `header.php` / `footer.php` | 共通ヘッダー（9項目ナビ・固定CTA）/ 共通フッター |
| `front-page.php` | トップページ（ニュースは投稿の新着3件、事例はプロジェクト事例の新着2件を自動表示） |
| `page-engineer.php` / `page-recruit.php` | エンジニアメリット / 募集要項（wordpress②） |
| `page-investor.php` / `page-faq.php` / `page-company.php` / `page-contact.php` | 各固定ページ |
| `page-privacy.php` / `page-terms.php` | プライバシーポリシー / ご利用規約（本文が空なら静的版の草案を表示） |
| `page.php` | 上記以外の汎用固定ページ |
| `home.php` / `single.php` | ニュース一覧 / 詳細 |
| `archive-project.php` / `single-project.php` | プロジェクト事例紹介一覧 / 詳細（wordpress③） |
| `index.php` / `404.php` | フォールバック / 404 |

## 静的版を更新したときの反映方法

静的HTML版を修正したら、同じ変更をテーマの対応ファイルにも入れてください（`index.html` → `front-page.php`、`xxx.html` → `page-xxx.php`、`styles.css` → `style.css`、`script.js` → `js/script.js`、`assets/` → `assets/`）。
テーマ側のリンクは `home_url( '/xxx/' )`、画像・動画は `$tpl . '/assets/…'` の形で書きます。

## セットアップ手順

1. この `rd-consortium/` フォルダを `wp-content/themes/` に配置（またはzip化して外観→テーマ→新規追加）
2. 外観 → テーマ で「R&D Consortium」を有効化
3. **設定 → パーマリンク** を「投稿名」に変更（テーマ内リンクは `/engineer/` 形式のため必須）
4. 固定ページを以下の**スラッグ**で作成（スラッグが一致すると対応テンプレートが自動適用されます）:
   - `engineer`（エンジニアメリット）/ `recruit`（エンジニア募集要項）/ `investor`（投資企業メリット）/ `faq`（よくある質問）
   - `company`（法人情報）/ `contact`（お問い合わせ）
   - `privacy`（プライバシーポリシー）/ `terms`（ご利用規約）→ 本文が空なら静的版と同じ草案を表示。エディタに本文を入力するとそちらを表示
   - `news`（お知らせ）→ 本文は空でOK
5. **設定 → 表示設定**: ホームページ=固定ページ（任意のページ。front-page.phpが優先適用）、投稿ページ=`news`
6. 投稿のカテゴリに「ニュース」「コラム」を作成（構成案どおりの分類。「コラム」は色違いのタグで表示）

※ テーマzipは動画を含むため約30MBあります。サーバーのアップロード上限（`upload_max_filesize`）がそれより小さい場合は、zipを解凍したフォルダをFTP等で `wp-content/themes/` に直接アップロードしてください。

## フォームについて

お問い合わせページは「問い合わせ」「投資企業相談」「エンジニアエントリー」の3つのタブ式フォームです。導線のクエリ文字列（`?type=investor` / `?type=engineer`、`&subject=`）に応じて
タブと対象名が自動で選ばれます。現在は見た目のみのため、Contact Form 7 等の導入後に `page-contact.php` の各 `<form>…</form>` を置き換えてください。

## 今後の拡張（提案書の想定に対応）

- **募集要項の管理画面編集**（wordpress②）: `recruit` 固定ページの本文に追記した内容は、募集要項ブロック末尾へ表示されます。項目ごとの編集が必要な場合はACF等へ移行してください。
- **プロジェクト事例**（wordpress③）: 管理画面の「プロジェクト事例」から追加・更新できます。1件も無い間は、トップと一覧に静的版と同じサンプル事例（詳細ボタンなし）を表示します。
  - カテゴリがタグとして表示されます（「進行中」「募集中」は強調色）。
  - カスタムフィールド `status` / `field` / `technology` を入力すると、詳細ページ上部に STATUS / FIELD / TECHNOLOGY の概要欄を表示します。
