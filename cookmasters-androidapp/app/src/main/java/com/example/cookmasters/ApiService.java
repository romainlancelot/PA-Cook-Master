package com.example.cookmasters;

import java.util.List;

import okhttp3.ResponseBody;
import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.Header;
import retrofit2.http.Headers;
import retrofit2.http.POST;

public interface ApiService {
    @FormUrlEncoded
    @POST("login")
    Call<ResponseBody> login(@Field("email") String email, @Field("password") String password);

    @Headers("Content-Type: application/json")
    @GET("courses")
    Call<List<Formation>> getFormations(@Header("Authorization") String token);
}
