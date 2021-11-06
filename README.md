./vendor/bin/sail up -d
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'

IDE-helper
sail artisan ide-helper:generate - PHPDoc generation for Laravel Facades
sail artisan ide-helper:models - PHPDocs for models
sail artisan ide-helper:meta - PhpStorm Meta file
