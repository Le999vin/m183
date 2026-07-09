#!/bin/bash
mkdir -p ~/pki/{ca,server} && cd ~/pki
openssl genrsa -out ca/ca.key 4096
openssl req -new -x509 -days 3650 -key ca/ca.key -out ca/ca.crt \
  -subj "/C=CH/ST=Zuerich/O=TBZ-M183-CA/CN=M183 Root CA"
openssl genrsa -out server/server.key 2048
openssl req -new -key server/server.key -out server/server.csr \
  -subj "/C=CH/ST=Zuerich/O=TBZ-M183/CN=$(curl -s ifconfig.me)"
openssl x509 -req -days 365 -in server/server.csr \
  -CA ca/ca.crt -CAkey ca/ca.key -CAcreateserial -out server/server.crt
cat server/server.crt ca/ca.crt > server/chain.crt
openssl x509 -in server/server.crt -text -noout | grep -A5 "Subject\|Issuer\|Validity\|Public Key"
openssl verify -CAfile ca/ca.crt server/server.crt
