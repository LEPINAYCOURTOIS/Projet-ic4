

import java.io.File;

import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.InetAddress;
import java.net.NetworkInterface;
import java.net.URL;
import java.util.Date;



public class Sonde {
	public static void main(String[] args) throws Exception {

			
		    
	  	    File file = new File("/");
	  	    long totalSpace = file.getTotalSpace();
	  	    
		  	System.out.println("============== Information sur le disque dur =====================");
		  	System.out.println();
		  	
	  	    // Affiche la taille du disque local C:
	  	    long totalSpaceG = totalSpace / 1000000000 ;
	  	    System.out.println("Espace total sur le disque " +  totalSpaceG + " Go");
	  	 
	  	    // Affiche l'espace libre du disque local C:
            long espaceLibre = file.getFreeSpace();
	  	    long espaceLibreG = espaceLibre / 1000000000 ;
	  	    System.out.println("Espace Libre sur le disque " +  espaceLibreG + " Go");
	  	    
	  	    // Affiche l'espace utilisÈ du disque local C:
	  	    long espaceUtiliseG = totalSpaceG - espaceLibreG ;
	  	    System.out.println("Espace UtilisÈ sur le disque " +  espaceUtiliseG + " Go");
	  	    System.out.println();
	  	    
	  	    // Affiche l'espace libre en %
	  	    long espace = (espaceLibre * 100) / totalSpace;
	  	    System.out.println("Espace Libre sur le disque " + espace + " %");
	  	    
	  	    // affiche l'espace utilisÈ en %
	  	    long espaceUtilisÈ = totalSpace - espaceLibre;
	  	    long espaceU = (espaceUtilisÈ* 100) / totalSpace;
	  	    System.out.println("Espace UtilisÈ sur le disque " +  espaceU+ " %");	  	    
	  	    System.out.println();
	  	     
	  	    System.out.println("============== Information sur le systÈme ========================");
	  	    System.out.println();
	  	    
	  	    // Obtenir l'adresse IP de la machine locale
	  	    InetAddress address = InetAddress.getLocalHost();
	  	    
			String ip_add_string = address.toString().toUpperCase(); 
			String[] PC = ip_add_string.split("/"); 
			
			// Affiche Le nom de la machine											
			String nom = PC[0];
			System.out.println("Mon PC est : "+nom);
			
			// information systÈme 
			String OS = System.getProperty("os.arch");
			String OS_Name =System.getProperty("os.name");
		  	System.out.println("SystÈme d'exploitation : " + OS_Name);
		  	System.out.println("Version : " + OS + " bits" );
		  	System.out.println();
		  	
			// Affiche l'adresse IP
			String addIp = PC[1];
			System.out.println("Mon adresse IP est: "+addIp);
			

			// Pour l'adresse MAC :
			
			StringBuilder addMa = new StringBuilder();
		    InetAddress addM = InetAddress.getLocalHost();
		    NetworkInterface ni = NetworkInterface.getByInetAddress(addM);
		    byte[] mac = ni.getHardwareAddress();
		    for (int i = 0; i < mac.length; i++) {
		      addMa.append(String.format("%02X%s", mac[i], (i < mac.length - 1) ? "-" : "")) ;
		    }
		    System.out.println("Mon adresse Mac est: "+addMa.toString());
		    String addMac = addMa.toString();
		    
		    InetAddress adresse = InetAddress.getLocalHost();
			NetworkInterface inter = NetworkInterface
					.getByInetAddress(adresse);
			System.out.println(inter);
			
			java.text.SimpleDateFormat sdf = new java.text.SimpleDateFormat("HH:mm");
			String Temps = sdf.format(new Date());
			System.out.println("Il est  " + Temps);
		  
			
			 // connexion au serveur
	  	    
			 URL url = new URL("http://192.168.1.30:8888/projet-ic4/hello.php");
			HttpURLConnection connexion = (HttpURLConnection) url.openConnection();
			connexion.setDoOutput(true); 
			connexion.setRequestMethod("POST");
			 
			OutputStreamWriter writer = new OutputStreamWriter(connexion.getOutputStream());
			writer.write("addIp="+addIp+"&nom="+nom+"&espaceUtilise="+espaceUtiliseG+"&OS="+OS_Name+OS+"&addMac="+addMac+"&inter="+inter+"&Temps="+Temps);
			writer.flush();
			
			if (connexion.getResponseCode()!=200) {
				System.out.println("erreur de connexion");
			}
			
		    }
		    
}
	

	

