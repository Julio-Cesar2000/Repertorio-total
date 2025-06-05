# Construction Project Management System
# This system demonstrates object-oriented programming concepts in Ruby
# including multiple classes, method usage, and object collaboration

class Building
  attr_accessor :name, :floors, :materials

  # Initialize a building with essential properties
  def initialize(name, floors, materials)
    @name = name
    @floors = floors
    @materials = materials
  end

  # Custom string representation for clear output
  def to_s
    <<~DESCRIPTION
      Building: #{@name}
      Floors: #{@floors}
      Materials: #{@materials.join(', ')}
    DESCRIPTION
  end
end

class Blueprint
  attr_accessor :name, :design_details

  # Create a new construction blueprint
  def initialize(name, design_details)
    @name = name
    @design_details = design_details
  end

  # Display blueprint information in a readable format
  def to_s
    <<~DESCRIPTION
      Blueprint: #{@name}
      Design Details:
      - Floors: #{@design_details[:floors]}
      - Materials: #{@design_details[:materials].join(', ')}
      - Special Features: #{@design_details[:features].join(', ')}
    DESCRIPTION
  end
end

class ConstructionManager
  def initialize
    @blueprints = []  # Stores available construction blueprints
    @buildings = []   # Tracks constructed buildings
  end

  # Add a new blueprint to the manager's repository
  def add_blueprint(blueprint)
    @blueprints << blueprint
    puts "Added blueprint: #{blueprint.name}\n\n"
  end

  # Construct a building from a registered blueprint
  def construct(blueprint_name, building_name)
    blueprint = @blueprints.find { |bp| bp.name == blueprint_name }
    
    if blueprint
      building = Building.new(
        building_name,
        blueprint.design_details[:floors],
        blueprint.design_details[:materials]
      )
      @buildings << building
      puts "Successfully constructed #{building_name}!\n\n"
    else
      puts "Blueprint '#{blueprint_name}' not found. Construction failed.\n\n"
    end
  end

  # Display all constructed buildings
  def list_constructions
    puts "=== Constructed Buildings ==="
    @buildings.each { |building| puts building }
  end

  # Display all available blueprints
  def list_blueprints
    puts "=== Available Blueprints ==="
    @blueprints.each { |blueprint| puts blueprint }
  end
end

# Example Usage for Presentation
puts "=== Initializing Construction Management System ===\n\n"

# Create a construction manager instance
cm = ConstructionManager.new

# Create and register blueprints
puts "--- Registering Blueprints ---"
office_blueprint = Blueprint.new("Office Tower", {
  floors: 25,
  materials: ["Steel", "Glass", "Concrete"],
  features: ["Underground Parking", "HVAC System", "Elevators"]
})
cm.add_blueprint(office_blueprint)

house_blueprint = Blueprint.new("Family Home", {
  floors: 2,
  materials: ["Wood", "Brick"],
  features: ["Solar Panels", "Smart Home System"]
})
cm.add_blueprint(house_blueprint)

# Construct buildings from blueprints
puts "--- Construction Process ---"
cm.construct("Office Tower", "Skyrise Business Center")
cm.construct("Family Home", "Smith Residence")

# Attempt to construct with unregistered blueprint
cm.construct("Stadium", "City Arena")  # This will fail

# Display system status
puts "--- Current Project Status ---"
cm.list_blueprints
cm.list_constructions