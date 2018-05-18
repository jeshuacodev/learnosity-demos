php_pages_port=9039
www_dir=www
blc=./node_modules/broken-link-checker/bin/blc
blc_output_file=link_checker_output.txt

lint:
	# check for php syntax errors
	find src www -type f -name '*.php' -exec php -l {} \; | (! grep -v "No syntax errors detected" )


test-404: yarn-install
	# Find broken links
	rm -f link_checker_output.txt
	php -S localhost:$(php_pages_port) -t $(www_dir) >/dev/null 2>&1 & \
	$(blc) http://localhost:9097 -r > $(blc_output_file)

	# Check for 404's
	if grep -q "404 Not Found" "$(blc_output_file)"; then
	    echo "404's Found"
	    cat mylogfile.txt
	    exit 1
	fi

yarn-install:
	yarn

pre-merge: lint test-404