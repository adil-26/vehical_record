# Step 1: Use an official PHP image from Docker Hub
FROM php:8.1-apache

# Step 2: Set working directory inside the container (optional, but recommended)
WORKDIR /var/www/html

# Step 3: Copy the entire project from your local machine to the Docker container
COPY . /var/www/html/

# Step 4: Expose port 80, which is the standard port for HTTP traffic
EXPOSE 80

# Step 5: Ensure Apache runs in the foreground (it’s the default behavior in this case)
CMD ["apache2-foreground"]
