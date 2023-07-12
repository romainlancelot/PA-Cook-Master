package com.example.cookmasters;

import android.content.Context;
import android.content.SharedPreferences;

public class SharedPreferencesHelper {

    private static final String SHARED_PREFERENCES_NAME = "my_shared_preferences";
    private static final String EMAIL_KEY = "email";
    private static final String PASSWORD_KEY = "password";
    private static final String TOKEN_KEY = "token";

    private SharedPreferences sharedPreferences;

    public SharedPreferencesHelper(Context context) {
        sharedPreferences = context.getSharedPreferences(SHARED_PREFERENCES_NAME, Context.MODE_PRIVATE);
    }

    public void saveLoginDetails(String email, String password, String token) {
        SharedPreferences.Editor editor = sharedPreferences.edit();
        editor.putString(EMAIL_KEY, email);
        editor.putString(PASSWORD_KEY, password);
        editor.putString(TOKEN_KEY, token);
        editor.apply();
    }

    public String getEmail() {
        return sharedPreferences.getString(EMAIL_KEY, null);
    }

    public String getPassword() {
        return sharedPreferences.getString(PASSWORD_KEY, null);
    }

    public String getToken() {
        return sharedPreferences.getString(TOKEN_KEY, null);
    }
}
