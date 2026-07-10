# R&D コンソーシアム LP

一般社団法人テクノサプライ「R&D コンソーシアム」の紹介ランディングページ（静的サイト）。

企業・人材・技術をつなぎ、オープンイノベーションを創造する循環型 技術創出プラットフォームのコンセプトサイトです。

## 構成

- `index.html` — ページ本体
- `styles.css` — スタイル（背景アニメーション・グラデーション強調など）
- `script.js` — メニュー開閉・パネル制御
- `assets/` — サイトで使用する画像

## rd-renewal/ — リニューアル版（複数ページ構成）

`ウェブサイト見積依頼/` の資料（ホームページ構成案・R&Dパンフ・提案書）に基づくリニューアル版。
パンフレットの世界観（藤紫×深紺、明朝見出し）に合わせたデザイン。

- `index.html` — トップ（コンセプト / エコシステム / 事業の強み / 参加導線 / お知らせ）
- `engineer.html` — エンジニア向け参加メリット・働き方
- `recruit.html` — エンジニア募集要項 + 共通フォームへの応募導線
- `investor.html` — 投資企業向け（参加メリット・課題解決の流れ）
- `projects.html` / `project-detail.html` — プロジェクト事例一覧 / 詳細
- `news.html` / `news-detail.html` — ニュース一覧 / 詳細
- `faq.html` — よくある質問（投資企業 / エンジニア 各5件）
- `company.html` — 法人情報（基本情報・代表挨拶・活動実績・関連会社）
- `contact.html` — 応募・投資企業相談・一般問い合わせの共通フォーム
- `privacy.html` / `terms.html` — プライバシーポリシー / ご利用規約（草案）

プレビュー: `python3 -m http.server 8000` → `http://localhost:8000/rd-renewal/`

## ローカルプレビュー

```bash
python3 -m http.server 8000
# → http://localhost:8000/
```

## 公開

GitHub Pages で公開しています。
