#!/bin/sh

set -eu

# 初回の空ボリュームでもキャッシュとコンパイル済みビューを書き込めるようにする
mkdir -p \
    /app/storage/framework/cache/data \
    /app/storage/framework/views \
    /app/storage/logs

# Compose から渡されたサーバーや検査コマンドをそのまま実行
exec "$@"
