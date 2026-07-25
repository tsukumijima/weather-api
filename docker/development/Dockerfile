FROM php:8.5-cli-bookworm

# Composer が配布物の取得に使う最小限のコマンドを追加
RUN apt-get update \
    && apt-get install -y --no-install-recommends git unzip \
    && git config --system --add safe.directory /app \
    && apt-get clean \
    && find /var/lib/apt/lists -mindepth 1 -delete

# Composer 本体は公式イメージの安定版を利用
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# 名前付きボリューム内に Laravel の書き込み先を毎回用意
COPY docker/development/entrypoint.sh /usr/local/bin/weather-api-entrypoint
RUN chmod +x /usr/local/bin/weather-api-entrypoint

WORKDIR /app

ENTRYPOINT ["weather-api-entrypoint"]
