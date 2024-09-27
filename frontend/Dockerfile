FROM node
WORKDIR /app
RUN apt update
RUN apt upgrade -y
COPY ./init.sh /
RUN chmod +x /init.sh
EXPOSE 8000
CMD ["bash", "/init.sh"]