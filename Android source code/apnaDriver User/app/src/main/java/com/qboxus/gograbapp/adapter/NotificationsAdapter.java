package com.qboxus.gograbapp.adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.ViewGroup;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.qboxus.gograbapp.Interface.AdapterClickListener;
import com.qboxus.gograbapp.databinding.FCountryItemListBinding;
import com.qboxus.gograbapp.databinding.ItemNotificationsListBinding;
import com.qboxus.gograbapp.model.NotificationsModel;
import com.qboxus.gograbapp.R;

import java.util.ArrayList;

public class NotificationsAdapter extends RecyclerView.Adapter<NotificationsAdapter.ViewHolder> {

    Context context;
    ArrayList<NotificationsModel> notificationsModelArrayList = new ArrayList<>();
    AdapterClickListener adapterClickListener;

    ItemNotificationsListBinding binding;

    public NotificationsAdapter(Context context, ArrayList<NotificationsModel> notificationsModelArrayList, AdapterClickListener adapterClickListener) {
        this.context = context;
        this.notificationsModelArrayList = notificationsModelArrayList;
        this.adapterClickListener = adapterClickListener;
    }

    @NonNull
    @Override
    public NotificationsAdapter.ViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int viewType) {

        binding = ItemNotificationsListBinding.inflate(LayoutInflater.from(viewGroup.getContext()), viewGroup, false);
        return new NotificationsAdapter.ViewHolder(binding);
    }

    @Override
    public void onBindViewHolder(@NonNull NotificationsAdapter.ViewHolder holder, int position) {

        final NotificationsModel item = notificationsModelArrayList.get(position);

        holder.binding.tvTitle.setText(item.getTitle());
        holder.binding.tvDate.setText(item.getDate());
    }

    @Override
    public int getItemCount() {
        return notificationsModelArrayList.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {

        ItemNotificationsListBinding binding;
        ViewHolder(@NonNull ItemNotificationsListBinding binding) {
            super(binding.getRoot());
            this.binding = binding;
        }


    }
}
