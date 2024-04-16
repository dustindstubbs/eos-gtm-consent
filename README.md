# GTM Consent
A WordPress custom plugin for managing consent of a GTM Container.

## Installation
- Download/Clone this repo into your /wp-content/plugins/ folder
- Activate in the Plugins section in the WP backend
- Go to the Settings menu for further instructions and setup steps

Below is 

# GTM Setup
## Setup Container
1. Click **Create New** account
<img width="386" alt="Pasted_Image_2024-04-16__11_20 AM" src="https://github.com/dustindstubbs/gtm-consent-plugin/assets/16979961/1ec99ff9-ba2c-4a0b-b6ec-6c1cfe9e7949">

3. Fill in the details and hit **Create**    
  <img width="386" alt="Pasted_Image_2024-04-16__11_22 AM" src="https://github.com/dustindstubbs/gtm-consent-plugin/assets/16979961/2cb393e8-5c8e-4aaf-8d95-e1a62b48e786">

4. This is your **Container ID**    
<img width="373" alt="image" src="https://github.com/dustindstubbs/gtm-consent-plugin/assets/16979961/2f26b5f2-f4f9-4328-9417-97da00e021fa">

## Setup GA4
1. Go to your **GA4 account**, click on the **admin icon**, then click **Data Streams**
<img width="388" alt="image" src="https://github.com/dustindstubbs/gtm-consent-plugin/assets/16979961/50d4ca39-028b-4e27-8efb-a4e78eb32c99">

2. Click on a **Data Stream** (or add a new **Web stream** if one doesn’t already exist) then copy the **Measurement ID**
<img width="386" alt="image" src="https://github.com/dustindstubbs/gtm-consent-plugin/assets/16979961/faa9cd6c-8f81-4a1c-9873-58c2d95d2f73">

3. Go back to your **Tag Manager container**, click **Tags** and then **New**
<img width="387" alt="image" src="https://github.com/dustindstubbs/gtm-consent-plugin/assets/16979961/32c402b5-0813-4f33-b018-994386ca74e5">

4. Click **Tag Configuration** and then **Google Analytics**
<img width="389" alt="image" src="https://github.com/dustindstubbs/gtm-consent-plugin/assets/16979961/844af504-9f49-486e-b9a4-81904a676103">

5. Click **Google Tag**
<img width="368" alt="image" src="https://github.com/dustindstubbs/gtm-consent-plugin/assets/16979961/ee2df986-0e38-45b5-8d4d-2a6b119aa156">

6. Paste your **Measurement ID** as the **Tag ID**
<img width="371" alt="image" src="https://github.com/dustindstubbs/gtm-consent-plugin/assets/16979961/b8b6af66-6f4c-4306-ac0a-9e59746851e8">

7. Click **Triggering** and select **All Pages**
<img width="382" alt="image" src="https://github.com/dustindstubbs/gtm-consent-plugin/assets/16979961/97d43aa9-144a-46c0-8036-b67519381264">

8. **Name this** GA4 Google Tag (or whatever) and **click Save**
<img width="385" alt="image" src="https://github.com/dustindstubbs/gtm-consent-plugin/assets/16979961/4b2f3abc-8bd3-4921-a078-97fe2093fccc">

## Setup Google Ads
1. Click **New tag** again, click **Tag Configuration**, click **Google Ads**
<img width="384" alt="image" src="https://github.com/dustindstubbs/gtm-consent-plugin/assets/16979961/45f50cf9-d5b5-416e-bfef-82df099360a0">

2. Click **Google Tag**
<img width="187" alt="image" src="https://github.com/dustindstubbs/gtm-consent-plugin/assets/16979961/759f2f27-9d0c-45ab-a7a7-16bbc82187eb">

3. Paste your **Google Ads ID** as the **Tag ID**
<img width="384" alt="image" src="https://github.com/dustindstubbs/gtm-consent-plugin/assets/16979961/5019b269-b08b-4fd7-95e9-ee0608f23ee3">

4. Name it **Google Ads Tag** (or something cool), add an **All Pages Trigger** and **hit Save**
<img width="347" alt="image" src="https://github.com/dustindstubbs/gtm-consent-plugin/assets/16979961/3bda0875-0096-4a5e-8782-7e8a4bd1b896">

## Publish Container
1. Once you have added all of your tags, hit **Submit**
<img width="380" alt="image" src="https://github.com/dustindstubbs/gtm-consent-plugin/assets/16979961/52c66cb5-34f6-45c9-9183-695b85d0721b">

2. Give it a **Version Name** and **Description** and hit **Publish**
<img width="374" alt="image" src="https://github.com/dustindstubbs/gtm-consent-plugin/assets/16979961/eb46385b-ca56-4d28-b5a5-25fb667ec7f4">

