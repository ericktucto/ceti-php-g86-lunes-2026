#!/usr/bin/env bash

for i in $(seq 10); do
data='{"path": "'
data+=$(openssl rand -hex 32)
data+='"}'
echo $data
curl --request POST \
  --url http://localhost:8080/api/v1/user/photo \
  --header 'Accept: */*' \
  --header 'Accept-Encoding: gzip, deflate, br' \
  --header 'Connection: keep-alive' \
  --header 'Content-Type: application/json' \
  --header 'User-Agent: EchoapiRuntime/1.1.0' \
  --data "$data" &
done
