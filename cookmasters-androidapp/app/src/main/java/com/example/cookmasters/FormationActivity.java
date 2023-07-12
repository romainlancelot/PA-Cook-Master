package com.example.cookmasters;

import android.os.Bundle;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class FormationActivity extends AppCompatActivity {

    private RecyclerView formationList;
    private SharedPreferencesHelper sharedPreferencesHelper;
    private ApiService apiService;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_formation);

        formationList = findViewById(R.id.formation_list);
        formationList.setLayoutManager(new LinearLayoutManager(this));

        sharedPreferencesHelper = new SharedPreferencesHelper(this);
        apiService = RetrofitClient.getClient().create(ApiService.class);

        loadFormations();
    }

    private void loadFormations() {
        String token = sharedPreferencesHelper.getToken();
        Call<List<Formation>> call = apiService.getFormations("Bearer " + token);
        call.enqueue(new Callback<List<Formation>>() {
            @Override
            public void onResponse(Call<List<Formation>> call, Response<List<Formation>> response) {
                if (response.isSuccessful()) {
                    List<Formation> formations = response.body();
                    FormationAdapter adapter = new FormationAdapter(formations);
                    formationList.setAdapter(adapter);
                } else {
                    Toast.makeText(FormationActivity.this, "Failed to load formations", Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<List<Formation>> call, Throwable t) {
                Toast.makeText(FormationActivity.this, "Error: " + t.getMessage(), Toast.LENGTH_SHORT).show();
            }
        });
    }
}
