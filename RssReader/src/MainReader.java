public class MainReader {

    /**
     * @param args
     */
    public static void main(String[] args) {

        Enclosure enclosure = null;
        Image image = null;
        for(Channel channel : XMLManager.getAlChannels()){
            System.out.println("Channel title : "+channel.getTitle());
            System.out.println("------------------------");
            for(Item i:channel.getAlItems()){
                System.out.println(i.getTitle());
                System.out.println(i.getPubDate());
                System.out.println(i.getAuthor());
                if (i.getAuthor()==null) i.setAuthor("");
                System.out.println("link="+i.getLink());
                System.out.println("Enclosure : ");
                enclosure = i.getEnclosure();
                if (enclosure==null) 
                	enclosure = new Enclosure();
                	System.out.println(enclosure.getType());
	                System.out.println(enclosure.getUrl());
	                System.out.println(enclosure.getLength());
	           
	          System.out.println("Image : ");
	                image = i.getImage();
	                if (image==null) 
	                	image = new Image();
	                	System.out.println(image.getTitle());
		                System.out.println(image.getUrl());
		                System.out.println(image.getLink());
		                System.out.println(image.getHeight());
		                System.out.println(image.getWidth());

		      System.out.println("------------------------");
 
                 
            }
        }
       
        DbService db = new DbService();
        db.write(XMLManager.getAlChannels());




    }

}