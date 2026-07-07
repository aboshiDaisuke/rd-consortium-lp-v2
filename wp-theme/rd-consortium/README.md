# R&D Consortium — WordPressテーマ

`rd-renewal/`（静的HTML版）をWordPressクラシックテーマに変換したものです。
デザイン・文言は静的版と同一で、**ニュースをWordPressの投稿で更新できる**ようになっています（提案書のwordpress①に対応）。

## ファイル構成

| ファイル | 役割 |
|---|---|
| `style.css` | テーマ情報ヘッダー + サイト全スタイル |
| `functions.php` | フォント/CSS/JS読み込み、ニュース取得ヘルパー |
| `header.php` / `footer.php` | 共通ヘッダー（ナビ・固定CTA）/ 共通フッター |
| `front-page.php` | トップページ（お知らせ枠は投稿から新着5件を自動表示） |
| `page-engineer.php` | エンジニア募集要項 + 応募フォーム |
| `page-investor.php` | 投資企業向け + 相談フォーム |
| `page-faq.php` / `page-company.php` / `page-contact.php` | 各固定ページ |
| `page.php` | 汎用固定ページ（プライバシーポリシー・利用規約はこれで表示） |
| `home.php` / `single.php` | お知らせ一覧 / 詳細 |
| `index.php` / `404.php` | フォールバック / 404 |

## セットアップ手順

1. この `rd-consortium/` フォルダを `wp-content/themes/` に配置（またはzip化して外観→テーマ→新規追加）
2. 外観 → テーマ で「R&D Consortium」を有効化
3. **設定 → パーマリンク** を「投稿名」に変更（テーマ内リンクは `/engineer/` 形式のため必須）
4. 固定ページを以下の**スラッグ**で作成（スラッグが一致すると対応テンプレートが自動適用されます）:
   - `engineer`（エンジニアの方）/ `investor`（投資企業の方）/ `faq`（よくある質問）
   - `company`（法人情報）/ `contact`（お問い合わせ）
   - `privacy`（プライバシーポリシー）/ `terms`（ご利用規約）→ 本文はエディタに入力（草案は `rd-renewal/privacy.html` / `terms.html` からコピー可）
   - `news`（お知らせ）→ 本文は空でOK
5. **設定 → 表示設定**: ホームページ=固定ページ（任意のページ。front-page.phpが優先適用）、投稿ページ=`news`
6. 投稿のカテゴリに「ニュース」「コラム」を作成（構成案どおりの分類）

## フォームについて

現在は見た目のみのダミーフォームです。Contact Form 7 等のプラグイン導入後、
各テンプレート内のコメント `フォームプラグイン導入時は…` の位置で `<form>…</form>` を
ショートコード出力に置き換えてください。

## 今後の拡張（提案書の想定に対応）

- **募集要項の管理画面編集**（wordpress②）: `page-engineer.php` の各ブロックをカスタムフィールド（ACF等）に置換
- **プロジェクト事例**（wordpress③）: カスタム投稿タイプ `project` を `functions.php` に追加し、`archive-project.php` / `single-project.php` を用意
