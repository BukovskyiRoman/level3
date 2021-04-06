server {
  listen 80;
  listen [::]:80;
  server_name mybooks.ua www.mybooks.ua;
  root /usr/share/nginx/html/mybooks.ua;
  index index.php index.html index.htm index.nginx-debian.html;

  
  
  location /admin {
    try_files $uri $uri/ /index.php;
	auth_basic "Restricted Content";
        auth_basic_user_file /etc/nginx/.htpasswd;

  }

 location / {
   try_files $uri $uri/ /index.php;
 }

  
  location ~ \.php$ {
    fastcgi_pass unix:/run/php/php7.4-fpm.sock;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    include fastcgi_params;
    include snippets/fastcgi-php.conf;
  }
  
  location ~ /\.ht {
      access_log off;
      log_not_found off;
      deny all;
  }
}
