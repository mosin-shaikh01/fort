# PHP 8.3 Upgrade - Quick Checklist

## Pre-Upgrade Checklist

- [ ] **Backup Database**
  ```bash
  C:\xampp\mysql\bin\mysqldump.exe -u root fort > fort_backup.sql
  ```

- [ ] **Backup WordPress Files**
  ```bash
  robocopy c:\xampp\htdocs\fort c:\xampp_backup\fort /E /XO
  ```

- [ ] **Note Your Settings**
  - Theme name (Fort Explorer) ✓
  - Active plugins (if any)
  - Admin user credentials
  - Site title & tagline

- [ ] **Stop XAMPP Services**
  - Open XAMPP Control Panel
  - Click "Stop" for Apache
  - Click "Stop" for MySQL
  - Wait for full shutdown

---

## Option A: Full XAMPP Upgrade (RECOMMENDED)

### Download (5 min)
- [ ] Visit: https://www.apachefriends.org/download.html
- [ ] Download: **XAMPP 8.3.x** for Windows
- [ ] Save to: `C:\Downloads\`
- [ ] Verify file: `xampp-windows-x64-8.3.x-installer.exe` (or similar)

### Install (10 min)
- [ ] Run installer
- [ ] Choose installation path: `C:\xampp\`
- [ ] When asked: "Keep existing MySQL" → **YES**
- [ ] Complete installation
- [ ] Do NOT start services yet

### Restore Files (5 min)
- [ ] Copy WordPress from backup:
  ```bash
  robocopy c:\xampp_backup\fort c:\xampp\htdocs\fort /E /COPY:DAT
  ```

### Verify Installation (5 min)
- [ ] Open XAMPP Control Panel
- [ ] Click "Start" for Apache
- [ ] Click "Start" for MySQL
- [ ] Go to: http://localhost/fort/
- [ ] Login to WordPress
- [ ] Check Dashboard - PHP warning gone? ✅

### Total Time: ~30 minutes
**Difficulty: Easy** ⭐⭐

---

## Option B: Manual PHP Upgrade (ADVANCED)

### Backup Current PHP (2 min)
- [ ] Stop XAMPP services
- [ ] Rename: `C:\xampp\php` → `C:\xampp\php_old`

### Download PHP (5 min)
- [ ] Visit: https://windows.php.net/download/
- [ ] Download: **PHP 8.3.x** (Thread Safe, x64)
- [ ] Extract to: `C:\Downloads\php-8.3.x-Win32-vs16-x64\`

### Install New PHP (5 min)
- [ ] Copy extracted folder to: `C:\xampp\php\`
- [ ] Verify files exist:
  - `C:\xampp\php\php.exe` ✓
  - `C:\xampp\php\php8apache2_4.dll` ✓
  - `C:\xampp\php\ext\` folder ✓

### Copy Required DLLs (2 min)
```bash
copy C:\xampp\php_old\php8ts.dll C:\xampp\php\
copy C:\xampp\php_old\libpq.dll C:\xampp\php\
copy C:\xampp\php_old\libsqlite3.dll C:\xampp\php\
```

### Restart Services (3 min)
- [ ] Open XAMPP Control Panel
- [ ] Click "Start" for Apache
- [ ] Click "Start" for MySQL
- [ ] Go to: http://localhost/fort/
- [ ] Verify WordPress loads

### Total Time: ~20 minutes
**Difficulty: Medium** ⭐⭐⭐

---

## Post-Upgrade Verification

### Test 1: Command Line Check
```bash
c:\xampp\php\php.exe -v
```
Expected output:
```
PHP 8.3.x (cli) (built: ...)
Copyright (c) The PHP Group
Zend Engine v4.3.x
```

### Test 2: WordPress Dashboard
- [ ] Open: http://localhost/fort/wp-admin/
- [ ] Username: (your admin username)
- [ ] Password: (your admin password)
- [ ] Navigate to: **Dashboard**
- [ ] Look for PHP version warning
- [ ] Should NOT see warning ✅

### Test 3: Site Health Check
- [ ] Go to: **Tools > Site Health**
- [ ] Check PHP version section
- [ ] Should show: **PHP 8.3.x or higher**
- [ ] Should show: **Green checkmark** ✓

### Test 4: Theme Check
- [ ] Go to: **Appearance > Themes**
- [ ] Fort Explorer should show: **Active**
- [ ] No errors or warnings

---

## If Something Goes Wrong

### Rollback to Backup (Fast Recovery)

**Step 1: Stop Services**
```bash
# Close XAMPP Control Panel
# Use Task Manager to kill: httpd.exe and mysqld.exe
```

**Step 2: Restore PHP**
```bash
# Delete broken PHP
rmdir C:\xampp\php /S /Q

# Restore backup
ren C:\xampp\php_old C:\xampp\php
```

**Step 3: Restore Files (if needed)**
```bash
# Copy files from backup
robocopy c:\xampp_backup\fort c:\xampp\htdocs\fort /E /COPY:DAT
```

**Step 4: Restart**
- Open XAMPP Control Panel
- Start Apache and MySQL
- Test: http://localhost/fort/

---

## Troubleshooting Guide

| Issue | Solution | Time |
|-------|----------|------|
| **WordPress won't load** | Restore from backup | 5 min |
| **Can't connect to database** | Restart MySQL (XAMPP Panel) | 2 min |
| **Apache won't start** | Check port 80 in use | 10 min |
| **Blank page / 500 error** | Check `C:\xampp\apache\logs\error.log` | 5 min |
| **PHP not found** | Check `C:\xampp\php\` exists | 2 min |

---

## Contact Information

If you need help:
1. **Check logs:** `C:\xampp\apache\logs\error.log`
2. **Review:** `UPGRADE_PHP.md` file (in site root)
3. **Ask:** Include exact error message

---

## Quick Summary

**Current State:**
- PHP: 8.0.30 ❌ (outdated)
- WordPress: Showing PHP warning ⚠️
- Fort Explorer Theme: Requires 8.3+ ❌

**After Upgrade:**
- PHP: 8.3.x or higher ✅
- Security: Updated & secure ✅
- Performance: 5-10% faster ✅
- Fort Explorer: Fully compatible ✅

**Estimated Time:** 25-35 minutes  
**Difficulty:** Easy-Medium  
**Risk Level:** Low (with backup)

---

**Ready to upgrade?** Follow Option A or B above! ⬆️
