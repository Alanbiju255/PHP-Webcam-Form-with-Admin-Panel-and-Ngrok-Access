#!/bin/bash
BACKUP_DIR="/var/www/html/testform_backup_$(date +%F)"
cp -r /var/www/html/testform/users "$BACKUP_DIR"
echo "Backup completed: $BACKUP_DIR"
