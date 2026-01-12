# Dynamic Portfolio

## 概要

このリポジトリは、**静的に作成したポートフォリオサイト**を、**PHPを用いて動的なWebページへリファクタリング**した学習・制作用プロジェクトです。

HTML / CSS / JavaScript で構成されていたサイトをベースに、共通パーツの分割や動的表示を行い、
保守性・拡張性を意識した構成へ改善しています。

---

## 制作背景・目的

* 静的サイトと動的サイトの違いを理解するため
* PHPを使ったページ共通化（`include`）の習得
* 実務を意識したファイル構成を学ぶため
* GitHubで制作過程を管理・公開するため

---

## 使用技術

* HTML5
* CSS3
* JavaScript
* PHP
* Git / GitHub

---

## 主な取り組み内容

* HTMLファイルをPHPファイルへ移行
* `header` / `footer` の共通化
* コンテンツの動的生成
* ディレクトリ構成の整理
* 修正・更新しやすい構造への改善

---

## ディレクトリ構成

```text
.
├── index.php
├── about.php
├── works.php
├── includes/
│   ├── header.php
│   └── footer.php
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
└── README.md
```

---

## 学習ポイント

* `.html` と `.php` の役割の違い
* `include` / `require` の基本的な使い方
* 動的ページにすることのメリット
* GitHubを用いたバージョン管理


---

## 補足

本リポジトリは**学習目的**で作成しています。

---

## 作者

* Name: Daisuke
* Learning: Web / PHP / Backend Basics
