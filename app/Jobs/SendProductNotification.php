<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class SendProductNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Producto que fue creado.
     * SerializesModels serializa el modelo para guardarlo en la cola.
     */
    public $product;

    /**
     * Recibe el producto creado.
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Ejecuta el trabajo (este código corre en background).
     * 
     * En un caso real aquí enviarías un email:
     * Mail::to('admin@example.com')->send(new ProductCreated($this->product));
     * 
     * Por simplicidad, solo registramos en logs.
     */
    public function handle(): void
    {
        // Simula procesamiento pesado
        sleep(3);
        $name = "Felix";
        // Registra en logs (storage/logs/laravel.log)
        Log::info('Notificación de producto creado', [
            'product_id' => $this->product->id,
            'product_name' => $this->product->name,
            'timestamp' => now()
        ]);
        
        // Aquí podrías enviar email real:
        // Mail::to('admin@example.com')->send(new ProductCreated($this->product));
    }
}