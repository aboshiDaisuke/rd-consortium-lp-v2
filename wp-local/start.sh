#!/bin/bash
# WordPress検証環境の起動スクリプト
# 使い方: ダブルクリック、またはターミナルで ./start.sh
cd "$(dirname "$0")"
echo "WordPress を http://localhost:8080 で起動します（終了は Ctrl+C）"
open "http://localhost:8080/"
wp server --host=127.0.0.1 --port=8080
