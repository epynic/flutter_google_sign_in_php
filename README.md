# Flutter Social SignIn Options

There have been many guides to get started with Google Sign using Firebase.

While this sample code will help you setup [google_sign_in](https://pub.dev/packages/google_sign_in) library without firebase.

## Flutter Google SignIn with PHP

1. Create a GCP project at 
https://console.cloud.google.com/projectcreate

2. Next go to https://developers.google.com/identity/sign-in/web/sign-in and select *Configure Project*, client as Android.
Enter Package name and SHA1


### Generating SHA1 signing certificates.

1. Execute in terminal (assign a password and some other parameters)
    
    `keytool -genkey -v -keystore ~/key.jks -keyalg RSA -keysize 2048 -validity 10000 -alias androiddebugkey`

2. From the above step you will have a `key.jks` file for you.

3. In `android/app/build.gradle` under android add these settings:
    ```
    signingConfigs {
        debug {
            storeFile file('key.jks') 
            storePassword 'epynic'
            keyAlias 'androiddebugkey'
            keyPassword 'epynic'
        }
    }
    buildTypes {
        debug {
            signingConfig signingConfigs.debug
        }
    }
    ```

    `storeFile file('/home/epynic/key.jks')` - path to your key file generated in step 2

    `storePassword 'epynic'` &  `keyPassword 'epynic'` the password used to generate the key in step 2.

4. In termial execute `keytool -keystore key.jks -list -v` and in the output you’ll have the SHA-1 fingerprint.

5. Find your package name at `AndroidManifest.xml` file, under the `package=` attribute.