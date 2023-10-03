FROM nginx:1.21.6
RUN apt update
RUN apt install sudo -y
RUN sudo apt-get update
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
RUN chmod +x wp-cli.phar
RUN sudo mv wp-cli.phar /usr/local/bin/wp
RUN apt install iputils-ping -y
RUN sudo apt -y install php7.4

RUN apt-get install php7.4-common php7.4-mysql -y

# FOR DEBUG
RUN apt-get install systemd -y
RUN apt-get install net-tools
