## Development

The Docker config will make sure all dependencies are required in the Virtual Machine. Or simply do it the old fashion way with npm and MAMP:

```sh
npm install
# Build
npm run build
# Watch files and build
npm start

```

### Install dependencies

```sh
# VirtualBox to manage virtual machines
brew cask install virtualbox
# Docker tools
brew install docker docker-compose docker-machine
```

### Environment Setup
```sh
# Create Docker host
docker-machine create -d virtualbox default
# Run Docker host
docker-machine start default
# Attach local Docker client to the host
eval $(docker-machine env default)

# Get machine IP address
docker-machine ip default
# And add it to the /etc/hosts file
# Example:
#
# 192.168.99.100 example.localhost
# 192.168.99.100 www.example.localhost
```

### Build and run

```sh
# Build the container (only needed when Dockerfile changes)
docker-compose build
# Run the container (-d runs as daemon, you can remove it)
docker-compose up -d

# For development purposes you can log into the container and run Gulp
docker exec -it kirbygulpboilerplate_web_1 bash
gulp watch

# Open the default browser
open http://example.localhost

# Stop the Docker container (if started with -d flag)
docker-compose stop
```

### Debug

```sh
docker logs -f <container_name>
```

### Sublime packages needed
- http://www.sublimelinter.com/en/latest/installation.html
- https://github.com/roadhump/SublimeLinter-eslint
