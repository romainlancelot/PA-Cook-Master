package com.example.cookmasters;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import java.util.List;

public class FormationAdapter extends RecyclerView.Adapter<FormationAdapter.FormationViewHolder> {

    private final List<Formation> formations;

    public FormationAdapter(List<Formation> formations) {
        this.formations = formations;
    }

    @NonNull
    @Override
    public FormationViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View itemView = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_formation, parent, false);
        return new FormationViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(@NonNull FormationViewHolder holder, int position) {
        Formation formation = formations.get(position);
        holder.name.setText(formation.getName());
        holder.description.setText(formation.getDescription());
        holder.difficulty.setText(String.valueOf(formation.getDifficulty()));
    }

    @Override
    public int getItemCount() {
        return formations.size();
    }

    static class FormationViewHolder extends RecyclerView.ViewHolder {

        TextView name;
        TextView description;
        TextView difficulty;

        public FormationViewHolder(@NonNull View itemView) {
            super(itemView);
            name = itemView.findViewById(R.id.formation_name);
            description = itemView.findViewById(R.id.formation_description);
            difficulty = itemView.findViewById(R.id.formation_difficulty);
        }
    }
}
